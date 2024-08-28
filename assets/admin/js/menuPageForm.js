class MenuItemForm {
  itemField = null;
  menuField = null;
  imageWrapper = null;
  itemOptions = [];
  constructor() {}

  init = () => {
    if (document.querySelector('form[name="menu_page"]')) {
      this.menuField = document.getElementById("menu_page_menu");
      this.itemField = document.getElementById("menu_page_menuItemParent");
      this.imageWrapper = document.querySelector(`.upload[id="menu_page"]`);
      this.buildItemOptionsArray();
      this.menuField.addEventListener("change", this.updateItemsSelect);
      this.updateItemsSelect();

      this.setEvents();
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


  setEvents = () => {
    this.imageWrapper.addEventListener("change", () => {
      this.updatePreview(this.imageWrapper);
      console.log(this.imageWrapper);
      
    });
  };

  updatePreview = imageWrapper => {
    const image = imageWrapper.querySelector("img");
    const file = imageWrapper.querySelector("input[type=file]").files[0];
    if (file) {
      const reader = new FileReader();
      reader.addEventListener("load", () => {
        image.src = reader.result;
      });
      reader.readAsDataURL(file);
      image.classList.remove("hidden");
    }
  };
}

export default MenuItemForm;
