class ProductDescriptionTemplate {
  form = null;

  constructor() {
    this.form = document.querySelector('form[name="product_description_template"]');
    this.firstDimensionAddButton = document.querySelector("#product_description_template_productDescriptionTemplateBlocks > .button[data-form-collection='add']");
    this.childrenPrototype = `
    <div data-form-collection="item" data-form-collection-index="__name__" class="column">
      <div class="ui box segment">
        <div id="_product_description_template_productDescriptionTemplateBlocks__parent___children___name__">
          <div class="field">
            <label for="_product_description_template_productDescriptionTemplateBlocks__parent___children___name___type">Type</label>
            <select
              id="_product_description_template_productDescriptionTemplateBlocks__parent___children___name___type"
              name="product_description_template[productDescriptionTemplateBlocks][__parent__][children][__name__][type]"
              class="product-description-template-block-type ui dropdown"
            >
              <option value="">Choisissez un type de bloc</option>
              <option value="0">Texte</option>
              <option value="1">Image</option>
              <option value="2">Disposition</option>
              <option value="3">Vidéo</option>
            </select>
          </div>

          <div class="field">
            <label for="_product_description_template_productDescriptionTemplateBlocks__parent___children___name___sortOrder">Ordre</label>
            <input
              type="number"
              id="_product_description_template_productDescriptionTemplateBlocks__parent___children___name___sortOrder"
              name="product_description_template[productDescriptionTemplateBlocks][__parent__][children][__name__][sortOrder]"
            />
          </div>

          <div class="field">
            <label for="_product_description_template_productDescriptionTemplateBlocks__parent___children___name___alignment">Alignement</label>
            <select
              id="_product_description_template_productDescriptionTemplateBlocks__parent___children___name___alignment"
              name="product_description_template[productDescriptionTemplateBlocks][__parent__][children][__name__][alignment]"
              class="product-description-template-block-alignment ui dropdown"
            >
              <option value="">Choisissez un alignement</option>
              <option value="0">Ligne</option>
              <option value="1">Colonne</option>
            </select>
          </div>
        </div>

        <a href="#" data-form-collection="delete" class="ui red labeled icon button" style="margin-bottom: 1em;">
          <i class="trash icon"></i> Supprimer
        </a>
      </div>
    </div>
    `;
  }

  init = () => {
    if (this.form) {
      if (this.form) {
        this.setEvents();
      }
      this.form.addEventListener("change", () => {
        this.setEvents();
      });
    }
    
  };

  setEvents = () => {
    document.querySelectorAll("div[data-form-collection='item']").forEach(element => {
      if(element.parentElement.parentElement.classList.contains("product-description-template-block-children")) return;
      
      let i = element.getAttribute("data-form-collection-index");
      let typeInput = element.querySelector("select[id=product_description_template_productDescriptionTemplateBlocks_" + i + "_type]");
      let alignmentInput = element.querySelector("select[id=product_description_template_productDescriptionTemplateBlocks_" + i + "_alignment]");
      let childrenContainer = element.querySelector("div[id=product_description_template_productDescriptionTemplateBlocks_" + i + "_children]");
      childrenContainer.setAttribute("data-prototype", this.childrenPrototype.replace(/__parent__/g, element.getAttribute("data-form-collection-index")));

      if (typeInput.value == 2) {
        childrenContainer.parentElement.style.display = "block";
        alignmentInput.parentElement.style.display = "block";
      }
      typeInput.addEventListener("change", () => {
        let display = "none"
        if (typeInput.value == 2) {
          display = "block";
          console.log(childrenContainer.getAttribute("data-prototype"));
        } 
        childrenContainer.parentElement.style.display = display;
        alignmentInput.parentElement.style.display = display;
      });
    });
    document.querySelectorAll(
      ".product-description-template-block-children"
    ).forEach((element) => {
      let list = element.querySelector("div[data-form-collection='list']");
      let prototype = element.getAttribute("data-prototype");
      let parentItemCollection = element.parentElement.parentElement.parentElement.parentElement;
      element.querySelector(".button[data-form-collection='add']").addEventListener("click", (event) => {
        event.stopPropagation();
        event.preventDefault()
        let items = list.querySelectorAll("div[data-form-collection='item']");
        let newElement = prototype
          .replace(/__name__/g, items.length);
      list.insertAdjacentHTML("beforeend", newElement);
      });
    });
  };

}

export default ProductDescriptionTemplate;
