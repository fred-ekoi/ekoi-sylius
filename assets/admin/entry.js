//import tailwind


// In this file you can import assets like images or stylesheets
import './styles/app.scss';
import MenuItemForm from "./js/menuItemForm.js";
import MenuPageForm from "./js/menuPageForm.js";
import CategoryPromotion from "./js/categoryPromotion.js";
import Taxon from './js/taxon.js';

const menuItemForm = new MenuItemForm();
const menuPageForm = new MenuPageForm();
const categoryPromotion = new CategoryPromotion();
const taxon = new Taxon();
document.addEventListener("DOMContentLoaded", () => {
  menuItemForm.init();
  menuPageForm.init(); 
  categoryPromotion.init();
  taxon.init();
});
