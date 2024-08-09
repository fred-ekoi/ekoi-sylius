import FormSelect from "./formSelect.js";

class CategoryPromotion {
  taxonsSelect = null;
  localSelect = null;
  imageWrappers = [];

  constructor() {}

  init = () => {
    if (document.querySelector('form[name="app_category_promotion"]')) {
      this.taxonsSelect = document.getElementById(
        "app_category_promotion_taxons"
      );
      this.localSelect = document.getElementById(
        "app_category_promotion_locales"
      );
      this.imageWrappers = document.querySelectorAll(
        `.upload[id^="app_category_promotion_translations"]`
      );

      this.setEvents();

      new FormSelect(this.taxonsSelect);
      new FormSelect(this.localSelect);
    }
  };

  setEvents = () => {
    this.imageWrappers.forEach(imageWrapper => {
      imageWrapper.addEventListener("change", () => {
        this.updatePreview(imageWrapper);
      });
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

export default CategoryPromotion;
