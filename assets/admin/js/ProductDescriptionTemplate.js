import { Sortable, Plugins } from '@shopify/draggable';

class ProductDescriptionTemplate {
  constructor() {
    this.form = document.querySelector('form[name="product_description_template"]');
    if (!this.form) return;

    this.alignDiv = this.createAlignDiv();
    this.fetchPrototype();
  }

  createAlignDiv() {
    const div = document.createElement("div");
    div.classList.add("draggable--handle");
    const icon = document.createElement("i");
    icon.classList.add("align", "justify", "icon");
    div.appendChild(icon);
    return div;
  }

  async fetchPrototype() {
    try {
      const response = await fetch('/admin/product-template/prototype/render', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({
          base_slug: 'your-base-slug-value',
          base_id: 'your-base-id-value'
        })
      });

      if (!response.ok) {
        throw new Error('Network response was not ok ' + response.statusText);
      }

      const data = await response.json();
      this.childrenPrototype = data.form;
    } catch (error) {
      console.error('Error fetching prototype:', error);
    }
  }

  init = () => {
    if (!this.form) return;

    this.setEventsOnChange();
    this.setEventsOnLoad();
    this.setSelectedOptions();

    this.form.addEventListener("change", this.setEventsOnChange);
  };

  setEventsOnLoad = () => {
    this.setSortable();
    document.querySelectorAll(".product-description-template-block-children").forEach(element => {
      this.displayBlocksByOrder(element);
      // console.log(element.querySelector(":scope > .button[data-form-collection='add']"));
      
      const button = element.querySelector(".button[data-form-collection='add']");
      button.addEventListener("click", (event) => this.onClick(event, element, button));
    });
    const element = document.querySelector(".sylius-product-description-template-block");
    const button = element.querySelector(":scope > .button[data-form-collection='add']");
    button.addEventListener("click", (event) => this.onClick(event, element, button, true));
  };

  setEventsOnChange = () => {
    document.querySelectorAll("div[data-form-collection='item']").forEach(element => {
      const childrenContainer = element.querySelector(".product-description-template-block-children");
      if (!childrenContainer) return;
      const childrenContainerId = childrenContainer.getAttribute("id");
      if (childrenContainerId && (childrenContainerId.match(/children/g) || []).length >= 3) return;
      
      const typeInput = element.querySelector(".product-description-template-block-type");
      const alignmentInput = element.querySelector(".product-description-template-block-alignment");

      this.updateDisplayBasedOnType(typeInput, childrenContainer, alignmentInput);
      typeInput.addEventListener("change", () => {
        this.updateDisplayBasedOnType(typeInput, childrenContainer, alignmentInput);
      });
      
      this.updateDisplayBasedOnAlignment(alignmentInput, childrenContainer);
      alignmentInput.addEventListener("change", () => {
        this.updateDisplayBasedOnAlignment(alignmentInput, childrenContainer);
      });
    });
  };

  updateDisplayBasedOnAlignment = (alignmentInput, childrenContainer) => {
    // console.log("update");
    
    let list = childrenContainer.querySelector(":scope > div[data-form-collection=list]");
    const items = list.querySelectorAll(":scope > div[data-form-collection='item']");
    if (alignmentInput.value == 1) {
      // list.style.flexDirection = "column";
      list.classList.add("align-column");
      list.classList.remove("align-row");
      // items.forEach(item => {
      //   item.style.width = "100%";
      // })
    } else {
      list.classList.add("align-row");
      list.classList.remove("align-column");
      // list.style.flexDirection = "row";
      // items.forEach(item => {
      //   item.style.width = "";
      // })
    }
  };

  updateDisplayBasedOnType = (typeInput, childrenContainer, alignmentInput) => {
    const display = typeInput.value == 2 ? "block" : "none";
    childrenContainer.parentElement.style.display = display;
    alignmentInput.parentElement.style.display = display;
  };

  setSortable = () => {
    this.sortable = new Sortable(document.querySelectorAll(".product-description-template-block-children > div[data-form-collection='list']"), {
      draggable: '.column[data-form-collection="item"]',
      handle: '.draggable--handle',
      mirror: { constrainDimensions: true },
      plugins: [Plugins.ResizeMirror]
    });

    this.sortable.on('sortable:stop', (event) => {
      setTimeout(() => {
        Array.from(event.newContainer.children).forEach((element, index) => {
          element.querySelector(".product-description-template-block-sort-order").value = index + 1;
        });
      }, 0);
    });
  };

  // TODO move this somewhere else
  displayBlocksByOrder = (element) => {
    const list = element.querySelector("div[data-form-collection='list']");
    const items = list.querySelectorAll("div[data-form-collection='item']");
    
    items.forEach(item => {
      item.appendChild(this.alignDiv.cloneNode(true));
    });
  };

  setSelectedOptions = () => {
    this.form.querySelectorAll(".product-description-template-block-type").forEach(typeSelector => {
      typeSelector.addEventListener("change", function() {
        this.querySelector('option[selected="selected"]')?.removeAttribute('selected');
        this.querySelector(`option[value="${this.value}"]`)?.setAttribute('selected', "selected");
      });
    });
  };

  convertIdToName = (input) => {
    const [prefix, ...remaining] = input.split('_');
    const prefixPart = remaining.slice(0, 2).reduce((acc, curr) => `${acc}_${curr}`, prefix);
    const remainingPart = remaining.slice(2);
    return `${prefixPart}[${remainingPart.map((item, index) => index === 1 ? `${item}` : item).join('][')}]`;
  };

  onClick = (event, element, button, isParent = false) => {     
    event.stopPropagation();
    event.preventDefault();
    // console.log('click');

    const childrenContainer = button.parentElement;
    const list = element.querySelector("div[data-form-collection='list']");
    const items = list.querySelectorAll("div[data-form-collection='item']");
    const newElement = this.childrenPrototype
      .replace(/__baseId__/g, childrenContainer.getAttribute("id"))
      .replace(/__baseName__/g, this.convertIdToName(childrenContainer.getAttribute("id")))
      .replace(/__name__/g, items.length)
      .replace(/__sortOrder__/g, items.length + 1);

    list.insertAdjacentHTML("beforeend", newElement);
    const newChild = list.lastElementChild;
    if (isParent) {
      newChild.querySelector('.draggable--handle')?.remove();
    }
    this.setEventsOnChild(newChild);
    this.setSelectedOptions();
  };

  setEventsOnChild = (childElement) => {
    const alignmentInput = childElement.querySelector(".product-description-template-block-alignment");
    const childrenContainer = childElement.querySelector(".product-description-template-block-children");
    const typeInput = childElement.querySelector(".product-description-template-block-type");

    childElement.querySelectorAll(".button[data-form-collection='add']").forEach(button => {
      button.addEventListener("click", (event) => this.onClick(event, childElement, button));
    });

    typeInput.addEventListener("change", () => {
      this.updateDisplayBasedOnType(typeInput, childrenContainer, alignmentInput);
    });
  };
}

export default ProductDescriptionTemplate;