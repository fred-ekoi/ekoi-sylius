import TomSelect from "tom-select";

class ProductFeature {
  productFeatureSelect = null;

  constructor() {}

  init = () => {
    if (document.querySelector('form[name="sylius_product"]')) {
      this.productFeatureSelect = document.getElementById(
        "sylius_product_features"
      );

      console.log(this.productFeatureSelect);

      new TomSelect(this.productFeatureSelect, {
        maxItems: 3,
        maxOptions: 2,
        sortField: {
          field: "text",
          direction: "asc"
        }
      })
    }
  };
}

export default ProductFeature;
