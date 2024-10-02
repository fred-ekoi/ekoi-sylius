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
   * Initialize the AutoTranslation class.
   */
  init() {
    this.accordion = document.querySelector('.accordion');
    this.defaultContainer = document.querySelector(`.accordion div[data-locale="${this.DEFAULT_LOCALE}"] .content`);

    if (this.accordion === null || this.defaultContainer === null) return;

    this.appendTranslateButton();
    this.setTranslateButtonEvent();
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
      this.handleTranslateButton();
    });
  }

  /**
   * Handle translate button click event.
   * Get all inputs and textareas from fr_FR container.
   * And then format it to be sent to custom route.
   */
  handleTranslateButton() {
    const defaultContainerInputs = this.defaultContainer.querySelectorAll('input[type="text"], textarea');
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
    const targetLocales = this.findOtherLocales();
    this.fetchTranslations({targetLocales, data});
  }

  /**
   * Fetch translations from custom route.
   * @param {{locale: string, name: string, value: string}[]} payload
   */
  fetchTranslations(payload) {
    fetch('/admin/auto-translation', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(payload)
    })
      .then((response) => response.json())
      .then((response) => {
        console.log(response);
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
}

export default AutoTranslation;
