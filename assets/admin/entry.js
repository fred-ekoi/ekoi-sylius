//import tailwind


// In this file you can import assets like images or stylesheets
import './styles/app.scss';
import Menu from "./js/menu.js";
import ProductFeature from "./js/productFeature.js";
import CategoryPromotion from "./js/categoryPromotion.js";
import CategoryOutfit from "./js/categoryOutfit.js";
import Taxon from './js/taxon.js';

const menu = new Menu();
const productFeature = new ProductFeature();
const categoryPromotion = new CategoryPromotion();
const categoryOutfit = new CategoryOutfit();
const taxon = new Taxon();
document.addEventListener("DOMContentLoaded", () => {
  menu.init();
  productFeature.init();
  categoryPromotion.init();
  categoryOutfit.init();
  taxon.init();
});
