class ProductDescription {
  productId = null;
  locales = null;

  constructor() {

  }

  init = () => {
    if (document.querySelector('form[name="sylius_product"]')) {
      this.productId = document.querySelector('form[name="sylius_product"]').getAttribute('action').split("/")[3];
      $.DirtyForms.ignoreClass = 'form';
      this.locales = document.querySelectorAll(".accordion > div[data-locale]");
      
      
      const templateSelect = document.querySelector("#sylius_product_translations_fr_FR_productDescriptionTemplate");
      this.generateFormDescription(templateSelect.value);

      document.querySelectorAll('.product-description-template-select').forEach((select) => select.addEventListener('change', (e) => {
        this.generateFormDescription(e.target.value);
      }));

      document.querySelector('form[name="sylius_product"]').addEventListener('submit', (e) => {
        e.preventDefault(); // Prevent the default form submission to inspect the data

        // You can now see if the "description" field contains the right value
        let data = {};
        for (const locale of this.locales) {
          let localeValue = locale.getAttribute('data-locale');

          // Ensure that data[localeValue] is initialized as an empty array
          if (!data[localeValue]) {
            data[localeValue] = {};
          }

          document.querySelectorAll(".product_description_block_content_" + localeValue).forEach((element) => {
            let templateBlockId = element.getAttribute('data-template-block');
            let type = element.getAttribute('data-type');
            let value = element.value;
            // console.log(value);

            data[localeValue][templateBlockId] = value;
            
          });
        }
        jQuery.ajax({
          type: "POST",
          url: "/admin/product-description-form/" + this.productId + "/update",
          data: {
            template_id: 8, // Pass the selected template ID
            description: JSON.stringify(data)
          },
          success: function (data) {
            // console.log(data);
    
            // After debugging, submit the form
            e.target.submit();
          }
        });
      });
    }
  };

  generateFormDescription = (templateId) => {
    // console.log(templateId);
    document.querySelector('form[name="sylius_product"]').classList.add('loading');
    let langProcessed = 0;
    this.locales.forEach((locale) => {
      locale.querySelector('.product-description-template-select').value = templateId;
      const localeValue = locale.getAttribute('data-locale');
      if (templateId) {
        fetch('/admin/product-description-form/' + this.productId + '/render', {
          method: 'POST',  // Specify POST method
          headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
          },
          body: JSON.stringify({
            template_id: templateId, // Pass the selected template ID
            locale: localeValue
          })
        })
        .then(response => {
          if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
          }
          return response.json();
        })
        .then(data => {
          console.log(data);
          document.querySelector("#sylius_product_translations_"  + localeValue + "_productDescriptionBlockContents").innerHTML = data.form;
          langProcessed++;
          if (langProcessed === this.locales.length) {
            document.querySelector('form[name="sylius_product"]').classList.remove('loading');
          }
        })
        .catch(
          error => console.error('Error:', error)
        );
      } else {
        document.querySelector("#sylius_product_translations_"  + localeValue + "_productDescriptionBlockContents").innerHTML = '';
      }

    });
  };
}

export default ProductDescription;
