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
  defaultContainer = null

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
   * Loader
   * @type {HTMLElement | null}
   */
  loader = null;

  /**
   * Error paragraph
   * @type {HTMLElement | null}
   */
  errorDiv = null;

  /**
   * Initialize the AutoTranslation class.
   */
  init() {
    this.accordion = document.querySelector('.accordion');
    this.defaultContainer = document.querySelector(`.accordion div[data-locale="${this.DEFAULT_LOCALE}"] .content`);

    if (this.accordion === null || this.defaultContainer === null) return;

    //TODO: refactor this
    this.fetchTemplates();
    // this.appendTranslateButton();
  }

  /**
   * Fetch templates from custom route.
   */
  fetchTemplates() {
    const locales = this.findOtherLocales();
    const query = locales.map((locale) => `locales[]=${locale}`).join('&');
    fetch(`/admin/auto-translation?${query}`)
      .then((response) => response.json())
      .then((response) => {
        const domParser = new DOMParser();
        const buttonDiv = domParser.parseFromString(response.button, 'text/html').body.firstElementChild;
        console.log(buttonDiv);
        this.translateButton = buttonDiv.querySelector('#translateButton');
        this.errorDiv = buttonDiv.querySelector('#errorDiv');
        this.accordion.after(buttonDiv);
        this.loader = this.translateButton.querySelector('.ui.loader');
        this.modal = domParser.parseFromString(response.modal, 'text/html').body.firstElementChild;
        document.body.insertAdjacentElement('beforeend', this.modal);
        this.setTranslateButtonEvent();
        this.handleModal();
      });
  }

  /**
   * Open a modal in which we can select in which languages we want to translate.
   * Then call {@link handleConfirmButton} with languages that we select
   */
  handleModal() {
    // Get the modal
    console.log(this.modal, this.modal.onclick)
    this.modal.onclick = function (event) {
      if (event.target === this.modal) {
        this.modal.style.display = "none";
      }
    }.bind(this);


    // Get the <span> element that closes the modal
    const closeBtn = document.getElementById('closeTranslationModal');
    closeBtn.onclick = function () {
      this.modal.style.display = "none";
    }.bind(this)

    // Get form element
    const form = this.modal.getElementsByTagName('form')[0];
    form.onsubmit = function (event) {
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
      this.modal.style.display = "none";
      this.loader.style.display = 'inline-block';
    }.bind(this)
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
    this.errorDiv?.classList.add('hidden');
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
        this.loader.style.display = 'none';
        if ('data' in response) {
          this.translatedData = response;
          this.fillTranslatedInputs();
          this.fillNonTranslatedInputs();
        } else if ('error' in response) {
          this.setError(response.error);
        }
      })
      .catch((error) => {
        this.setError('Une erreur s\'est produite lors de la traduction.');
      });
  }

  /**
   * Set error message
   *
   * @param {string} message - Error message
   */
  setError(message) {
    const errorParagraph = this.errorDiv.querySelector('p');
    errorParagraph.innerText = message;
    this.errorDiv?.classList.remove('hidden');
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

    const {data} = this.translatedData;
    data.forEach((translatedData) => {
      const {locale, localeData} = translatedData;
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
