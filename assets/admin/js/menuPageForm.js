class MenuItemForm {
  itemField = null;
  menuField = null;
  itemOptions = [];
  constructor() {}

  init = () => {
    if (document.querySelector('form[name="menu_page"]')) {
      this.menuField = document.getElementById("menu_page_menu");
      this.itemField = document.getElementById("menu_page_menuItemParent");
      this.buildItemOptionsArray();
      this.menuField.addEventListener("change", this.updateItemsSelect);
      this.updateItemsSelect();
    }
  };

  buildItemOptionsArray = () => {
    const options = this.itemField.querySelectorAll("option");
    for (let i = 0; i < options.length; i++) {
      this.itemOptions.push(options[i]);
    }
  };

  updateItemsSelect = () => {
    this.itemField.innerHTML = "";

    const menuId = this.menuField.value;
    this.itemOptions.forEach(option => {
      if(option.dataset.menu == menuId || option.value == "") {
        this.itemField.appendChild(option);
      }
    });
  };
}

export default MenuItemForm;
