class FormSelect {
  select = null;
  button = null;
  allOptionSelected = false;
  constructor(select) {
    this.select = select;
    this.init();
  }

  init = () => {
    if (this.select != undefined && typeof this.select == "object") {
      this.checkOptionSelection();

      const selectWrapper = this.select.parentElement;
      this.button = document.createElement("button");
      this.button.setAttribute("type", "button");
      this.button.classList.add("ui", "button", "small", "mb-3");
      this.button.innerText = this.allOptionSelected
        ? "Tout désélectionner"
        : "Tout sélectionner";
      selectWrapper.insertBefore(this.button, this.select);
      this.setButtonEvent();
      this.setSelectEvent();
    }
  };

  setButtonEvent = () => {
    this.button.addEventListener("click", () => {
      if (this.allOptionSelected == true) {
        this.select.querySelectorAll("option").forEach((option) => {
          option.selected = false;
        });
      } else {
        this.select.querySelectorAll("option").forEach((option) => {
          option.selected = true;
        });
      }
      this.checkOptionSelection();
    });
  };

  setSelectEvent = () => {
    this.select.addEventListener("input", () => {
      this.checkOptionSelection();
    });
  };

  checkOptionSelection = () => {
    this.allOptionSelected = true;
    this.select.querySelectorAll("option").forEach((option) => {
      if (!option.selected) {
        this.allOptionSelected = false;
      }
    });
    if (this.button != null) {
      this.setButtonLabel();
    }
  };

  setButtonLabel = () => {
    if (this.allOptionSelected) {
      this.button.innerText = "Tout désélectionner";
    }

    if (!this.allOptionSelected) {
      this.button.innerText = "Tout sélectionner";
    }
  };
}

export default FormSelect;
