import { Sortable, Plugins } from '@shopify/draggable';

class ProductDescriptionTemplate {
  form = null;
  alignDiv = null;

  constructor() {
    this.form = document.querySelector('form[name="product_description_template"]');
    if (this.form) {
      // get prototype
      fetch('/admin/product-template/prototype/render', {
        method: 'POST',  // Specify POST method
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({
          base_slug: 'your-base-slug-value',
          base_id: 'your-base-id-value'
        })
      })
      .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.json();
      })
      .then(data => {
          this.childrenPrototype = data.form;
          console.log(this.childrenPrototype); // Log or use the "form" value
      })


      this.alignDiv = document.createElement("div");
      this.alignDiv.classList.add("draggable--handle");
      const icon = document.createElement("i");
      icon.classList.add("align", "justify", "icon");
      this.alignDiv.appendChild(icon); 
    }
  }

  init = () => {
    if (this.form) {
      this.setEventsOnChange();
      this.setEventsOnLoad();
      this.setSelectedOptions();


      this.form.addEventListener("change", () => {
        this.setEventsOnChange();
      });

      this.form.querySelector("#product_description_template_productDescriptionTemplateBlocks > .button[data-form-collection='add']").addEventListener("click", (event) => {
        setTimeout(() => {
          const lastElement = this.form.querySelector("#product_description_template_productDescriptionTemplateBlocks > div[data-form-collection='list'] > div[data-form-collection='item']:last-child");
          const element = lastElement.querySelector(".product-description-template-block-children");
          const button = element.querySelector(".button[data-form-collection='add']");
          button.addEventListener("click", (event) => this.onClick(event, element, button));
          lastElement.querySelector(".product-description-template-block-sort-order").value = parseInt(lastElement.getAttribute("data-form-collection-index")) + 1;
        }, 0);
        
      });
    }
  };

  setEventsOnLoad = () => {
    // TODO : make the elements draggable between parents
    this.setSortable();

    document.querySelectorAll(".product-description-template-block-children").forEach((element) => {
      this.displayBlocksByOrder(element);
      element.querySelectorAll(".button[data-form-collection='add']").forEach(button => {
        button.addEventListener("click", (event) => this.onClick(event, element, button));
      });
    });
  };

  setEventsOnChange = () => {
    document.querySelectorAll("div[data-form-collection='item']").forEach(element => {
      if(element.parentElement.parentElement.classList.contains("product-description-template-block-children")) return;
      
      let typeInput = element.querySelector(".product-description-template-block-type");
      let alignmentInput = element.querySelector(".product-description-template-block-alignment");
      let childrenContainer = element.querySelector(".product-description-template-block-children");

      if (typeInput.value == 2) {
        childrenContainer.parentElement.style.display = "block";
        alignmentInput.parentElement.style.display = "block";
      }

      typeInput.addEventListener("change", () => {
        let display = "none"
        if (typeInput.value == 2) {
          display = "block";
        } 
        childrenContainer.parentElement.style.display = display;
        alignmentInput.parentElement.style.display = display;
      });
    });
  };

  setSortable = () => {
    this.sortable = new Sortable(document.querySelectorAll(".product-description-template-block-children > div[data-form-collection='list']"), {
      draggable: '.column[data-form-collection="item"]',
      handle: '.draggable--handle',
      mirror: {
        constrainDimensions: true,
      },
      plugins: [Plugins.ResizeMirror],
    });
    this.sortable.on('sortable:stop', (event) => {
      setTimeout(function() {
        Array.from(event.newContainer.children).forEach((element, index) => {
          element.querySelector(".product-description-template-block-sort-order").value = index + 1;
        }) 
      }, 0);
    });
  };

  displayBlocksByOrder = (element) => {
    let list = element.querySelector("div[data-form-collection='list']");
    let items = list.querySelectorAll("div[data-form-collection='item']");
    let blocks = [];
    items.forEach((item, index) => {
      blocks[item.querySelector(".product-description-template-block-sort-order").value] = item;
    });
    

    // Clear the container and reinsert blocks in sorted order
    list.innerHTML = '';
    blocks.forEach(block => {
      block.appendChild(this.alignDiv.cloneNode(true));
      list.appendChild(block)
    });
  };

  setSelectedOptions = () => {
    this.form.querySelectorAll(".product-description-template-block-type").forEach(typeSelector => {
      typeSelector.addEventListener("change", function(e) {
        this.querySelector('option[selected="selected"]').removeAttribute('selected');
        this.querySelector(`option[value="${this.value}"]`).setAttribute('selected', "selected");
      });
    });
  };

  convertIdToName = (input) => {
      // Match the prefix and the rest separately
      const prefix = input.split('_').slice(0, 3).join('_');  // Get "product_description_template"
      const remaining = input.split('_').slice(3);  // Get the rest ["productDescriptionTemplateBlocks", "0", "children"]
  
      // Construct the result
      const result = `${prefix}[${remaining.map((item, index) => index === 1 ? `${item}` : item).join('][')}]`;
      
      return result;
  }

  onClick = (event, element, button) => {     
    event.stopPropagation();
    event.preventDefault()
    
    const childrenContainer = button.parentElement;
    console.log(childrenContainer.getAttribute("id"));
    console.log(this.convertIdToName(childrenContainer.getAttribute("id")));

    let list = element.querySelector("div[data-form-collection='list']");
    let items = list.querySelectorAll("div[data-form-collection='item']");
    let newElement = this.childrenPrototype
      .replace(/__baseId__/g, childrenContainer.getAttribute("id"))
      .replace(/__baseName__/g, this.convertIdToName(childrenContainer.getAttribute("id")))
      .replace(/__name__/g, items.length)
      .replace(/__sortOrder__/g, items.length + 1);
    list.insertAdjacentHTML("beforeend", newElement);
    this.setSelectedOptions();
  }
}

export default ProductDescriptionTemplate;