class MenuItemForm {
  typeField = null;
  urlFieldWrapper = null;
  taxonFieldWrapper = null;
  menuField = null;
  pageField = null;
  pageOptions = [];
  constructor() {}

  init = () => {
    if (document.querySelector('form[name="menu_item"]')) {
      this.menuField = document.getElementById("menu_item_menu");
      this.typeField = document.getElementById("menu_item_type");
      this.pageField = document.getElementById("menu_item_menuPage");
      this.taxonFieldWrapper = document.getElementById("menu_item_taxon").parentElement;
      this.urlFieldWrapper =
        document.getElementById("menu_item_url").parentElement;

      this.typeField.addEventListener("change", this.toggleUrlField);
      this.menuField.addEventListener("change", this.updatePageSelect);
      this.toggleUrlField();
      this.buildPageOptionsArray();
      this.updatePageSelect();
      
    }
  };

  toggleUrlField = () => {
    if (this.typeField.value === "link") {
      this.urlFieldWrapper.style.display = "block";
      this.taxonFieldWrapper.style.display = "none";
    }
    if(this.typeField.value === "category"){
      this.taxonFieldWrapper.style.display = "block";
      this.urlFieldWrapper.style.display = "none";
    }
  };

  buildPageOptionsArray = () => {
    const options = this.pageField.querySelectorAll("option");
    for (let i = 0; i < options.length; i++) {
      this.pageOptions.push(options[i]);
    }
  };

  updatePageSelect = () => {
    this.pageField.innerHTML = "";
    const menuId = this.menuField.value;
    this.pageOptions.forEach(option => {
      // console.log(option.dataset.menu);
      // console.log(menuId);
      if(option.dataset.menu === menuId){
        this.pageField.appendChild(option);
      }
    });
  };
}

export default MenuItemForm;
