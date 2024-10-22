/**
 * Class that handles auto translation button and functionality.
 */
class AutoTranslation {
  /**
   * The locale that will be used for translation.
   * @type {string}
   */
  DEFAULT_LOCALE = 'fr_FR';

  /**
   * @type {HTMLElement | null}
   * Translate accordion
   */
  accordion = null;

  /**
   * @type {HTMLElement | null}
   * Translate button
   */
  translateButton = null;

  /**
   * @type {HTMLElement | null}
   * div that contains fr_FR inputs
   */
  defaultContainer= null

  /**
   * Translated data
   * @type {
   *  {
   *    data: {
   *      locale: string,
   *      localeData: {
   *        name: string,
   *        value: string
   *      }[]
   *    }[]
   * } | null}
   */
  translatedData = null;

  /**
   * Modal for translation
   * @type {HTMLElement | null}
   */
  modal = null;

  /**
   * Initialize the AutoTranslation class.
   */
  init() {
    this.accordion = document.querySelector('.accordion');
    this.defaultContainer = document.querySelector(`.accordion div[data-locale="${this.DEFAULT_LOCALE}"] .content`);

    if (this.accordion === null || this.defaultContainer === null) return;

    this.appendTranslateButton();
    this.setTranslateButtonEvent();
    this.handleModal();
  }

  /**
   * Open a modal in which we can select in which languages we want to translate.
   * Then call {@link handleConfirmButton} with languages that we select
   */
  handleModal() {
    const modalHtml = `
            <div id="translationModal" class="modal" style="display:none;">
              <div class="modal-content">
                <span class="close" id="closeTranslationModal">&times;</span>
                <p>Sélectionnez les langues souhaitées :</p>
                <form>
                    <button class="ui primary button" id="submitTranslationModal" type="submit">Confirmer</button>
                </form>
              </div>
            </div>

            <style>
              .modal {
                display: none;
                position: fixed;
                z-index: 1000;
                padding-top: 60px;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgba(0, 0, 0, 0.4);
              }

              .modal .modal-content {
                background-color: #fefefe;
                margin: 50px auto;
                padding: 20px;
                border: 1px solid #888;
                max-width: 500px;
                width: 80%;
              }

              .modal .close {
                color: #aaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
              }

              .modal .close:hover,
              .modal .close:focus {
                color: black;
                text-decoration: none;
                cursor: pointer;
              }

              .modal form {
                display: flex;
                flex-direction: column;
                gap: 1rem;
                padding-bottom: 20px;
              }

              .modal label {
                display: flex;
                gap: 1rem;
                align-items: center;
              }
            </style>
        `;

    document.body.insertAdjacentHTML('beforeend', modalHtml);

    // Get the modal
    const modal = document.getElementById('translationModal');
    this.modal = modal;
    modal.onclick = function(event) {
      if (event.target === modal) {
        modal.style.display = "none";
      }
    }

    // Get form element
    const form = modal.getElementsByTagName('form')[0];
    const locales = this.findOtherLocales();
    locales.forEach((locale) => {
      // Create checkbox for each locale
      const label = document.createElement('label');
      label.innerHTML = `
        <input type="checkbox" name="${locale}" value="${locale}" checked>
        <span>${locale}</span>
      `;
      // Append checkbox to form
      form.insertAdjacentElement('afterbegin',
        label
      );
    })

    // Get the <span> element that closes the modal
    const closeBtn = document.getElementById('closeTranslationModal');
    closeBtn.onclick = function() {
      modal.style.display = "none";
    }

    form.onsubmit = function(event) {
      event.preventDefault();
      // Get all checkboxes that we create
      const checkboxes = form.querySelectorAll('input[type="checkbox"]');
      const locales = [];
      // Add each locale that we select to locales array
      checkboxes.forEach((checkbox) => {
        if (checkbox.checked) {
          locales.push(checkbox.value);
        }
      });
      if (locales.length === 0) {
        alert('Veuillez sélectionner au moins un champ.');
        return;
      }
      this.handleConfirmButton(locales);
      modal.style.display = "none";
    }.bind(this)
  }

  /**
   * Create translate button with primary button style and margin top.
   * And then append it after accordion.
   */
  appendTranslateButton() {
    this.translateButton = document.createElement('button');
    this.translateButton.className = 'ui labeled icon primary button';
    this.translateButton.innerHTML = `
      <i class="translate icon"></i>
      Traduire
    `;
    this.translateButton.style.marginTop = '1rem';

    this.accordion.after(this.translateButton);
  }

  /**
   * Set click event for translate button.
   */
  setTranslateButtonEvent() {
    if (this.translateButton === null) return;

    this.translateButton.addEventListener('click', (event) => {
      event.preventDefault();
      this.modal.style.display = "block";
    });
  }

  /**
   * Handle translate button click event.
   * Get all inputs and textareas from {@link DEFAULT_LOCALE} container.
   * And then format it to be sent to custom route using targetLocales.
   *
   * @param {string[]} targetLocales - Locales that we want to translate to.
   */
  handleConfirmButton(targetLocales) {
    const defaultContainerInputs = this.defaultContainer.querySelectorAll('input[type="text"], textarea');
    this.modal.style.display = "none";
    const data = [];
    defaultContainerInputs.forEach((input) => {
      const inputName = input.name;
      const locale = inputName.split('[')[2].split(']')[0];
      const name = inputName.split('[')[3].split(']')[0];
      if (locale && name && input.value) {
        data.push({
          locale,
          name,
          value: input.value
        });
      }
    });
    this.fetchTranslations({targetLocales, data});
  }

  /**
   * Fetch translations from custom route.
   *
   * @param {{data: {locale: string, name: string, value: string}[], targetLocales: string[]}} payload
   */
  fetchTranslations(payload) {
    // TODO: Handle errors
    fetch('/admin/auto-translation', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(payload)
    })
      .then((response) => response.json())
      .then((response) => {
        if ('data' in response) {
          this.translatedData = response;
          this.fillTranslatedInputs();
          this.fillNonTranslatedInputs();
        }
      });
  }

  /**
   * Find other locales based on the given locale.
   * @returns {string[]}
   */
  findOtherLocales() {
    const divs = this.accordion.querySelectorAll('div[data-locale]');
    const locales = [];
    divs.forEach((div) => {
      const locale = div.getAttribute('data-locale');
      if (locale !== this.DEFAULT_LOCALE) {
        locales.push(locale);
      }
    });
    return locales;
  }

  /**
   * Fill inputs and textareas based on the translated data.
   */
  fillTranslatedInputs() {
    if (this.translatedData === null) return;

    const { data } = this.translatedData;
    data.forEach((translatedData) => {
      const { locale, localeData } = translatedData;
      const container = document.querySelector(`.accordion div[data-locale="${locale}"] .content`);
      if (container === null) return;

      localeData.forEach((data) => {
        const input = container.querySelector(`input[name$="[${locale}][${data.name}]"],textarea[name$="[${locale}][${data.name}]"]`);
        if (input !== null) {
          input.value = data.value;
        }
      });
    })
  }

  /**
   * Fill inputs that are not translated.
   */
  fillNonTranslatedInputs() {
    const defaultInputsNonTranslatable = this.defaultContainer.querySelectorAll('input:not([type="text"]), select');
    defaultInputsNonTranslatable.forEach((input) => {
      const attributes = input.attributes;
      const nameAttribute = attributes['name']?.value;
      const nameBeforeLocale = nameAttribute.split(this.DEFAULT_LOCALE)[0];
      const nameAfterLocale = nameAttribute.split(this.DEFAULT_LOCALE)[1];
      const typeAttribute = attributes['type']?.value;
      const selector = `${input.tagName.toLowerCase()}[name^="${nameBeforeLocale}"][name$="${nameAfterLocale}"]`;
      const otherElements = document.querySelectorAll(selector);
      otherElements.forEach((element) => {
        if (typeAttribute === "file") {
          const dataTransfer = new DataTransfer();
          for (let i = 0; i < input.files.length; i++) {
            dataTransfer.items.add(input.files[i]);
          }
          element.files = dataTransfer.files;
        } else {
          element.value = input.value;
        }
      });
    })
  }
}

export default AutoTranslation;
