/**
 * Class that handles auto translation button and functionality.
 */
class AutoTranslation {
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
  frContainer= null

  /**
   * Initialize the AutoTranslation class.
   */
  init() {
    this.accordion = document.querySelector('.accordion');
    this.frContainer = document.querySelector('.accordion div[data-locale="fr_FR"] .content');

    if (this.accordion === null || this.frContainer === null) return;

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
      Translate
    `;
    this.translateButton.style.marginTop = '1rem';

    this.accordion.after(this.translateButton);
  }

  setTranslateButtonEvent() {
    if (this.translateButton === null) return;

    this.translateButton.addEventListener('click', () => {
      this.handleTranslateButton();
    });
  }

  handleTranslateButton() {
    alert('test')
  }
}

export default AutoTranslation;
