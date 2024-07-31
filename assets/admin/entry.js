// In this file you can import assets like images or stylesheets
import MenuItemForm from "./menuItemForm.js";
import MenuPageForm from "./menuPageForm.js";

const menuItemForm = new MenuItemForm();
const menuPageForm = new MenuPageForm();
document.addEventListener("DOMContentLoaded", () => {
  menuItemForm.init();
  menuPageForm.init(); 
});
