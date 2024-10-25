class Menu {
  imageWrapper = null;

  constructor() {}

  init = () => {
    if (document.querySelector('form[name="menu_item"]')) {
      this.imageWrapper = document.querySelector(`.upload[id="menu_item"]`);

      this.setEvents();
    }
  };

  setEvents = () => {
    this.imageWrapper.addEventListener("change", () => {
      this.updatePreview(this.imageWrapper);
      // console.log(this.imageWrapper);
      
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

export default Menu;
