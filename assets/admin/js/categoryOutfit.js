import FormSelect from "./formSelect.js";
import { updatePreview } from "./main.js";

class CategoryOutfit {
  productsSelect = null;
  imageWrappers = null;

  constructor() {}

  init = () => {
    if (document.querySelector('form[name="app_category_outfit"]')) {
      this.productsSelect = document.getElementById(
        "app_category_outfit_products"
      );
      this.imageWrappers = document.querySelectorAll(
        `.upload[id^="app_category_outfit_translations"]`
      );

      this.setEvents();
    }
  };

  setEvents = () => {
    this.imageWrappers.forEach(imageWrapper => {
      imageWrapper.addEventListener("change", () => {
        updatePreview(imageWrapper);
      });
    });
  };
}

export default CategoryOutfit;
