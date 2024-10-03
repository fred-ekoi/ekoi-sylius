//import tailwind


// In this file you can import assets like images or stylesheets
import './styles/app.scss';
import ProductFeature from "./js/productFeature.js";
import CategoryPromotion from "./js/categoryPromotion.js";
import CategoryOutfit from "./js/categoryOutfit.js";
import Taxon from './js/taxon.js';
import AutoTranslation from './js/autoTranslation.js';
import Menu from "./js/menu";

const menu = new Menu();
const productFeature = new ProductFeature();
const categoryPromotion = new CategoryPromotion();
const categoryOutfit = new CategoryOutfit();
const taxon = new Taxon();
const autoTranslation = new AutoTranslation();

document.addEventListener("DOMContentLoaded", () => {
  menu.init();
  productFeature.init();
  categoryPromotion.init();
  categoryOutfit.init();
  taxon.init();
  autoTranslation.init();
});
