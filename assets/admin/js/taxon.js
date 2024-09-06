class Taxon {
  imageWrapper = null;

  constructor() {}

  init = () => {
    if (document.querySelector('form[name="sylius_taxon"]')) {
      this.imageWrapper = document.querySelector(`.upload[id="sylius_taxon"]`);

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

export default Taxon;
