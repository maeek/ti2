import { addToBasket, getBasket } from "./api/service.js";
import { appendToDom, templateToHtml } from "./domUtils.js";

const domMenu = document.getElementById('menu');

const menuItemTemplate = (itemId, itemName, itemDesc, itemPrice) => `
<li class="menu-item">
  <div class="menu-item-img">
    <img src="assets/kuchnia-polska.jpg" alt="Menu item 1" />
  </div>
  <div class="menu-item-text">
    <h4>${itemName}</h4>
    <p>${itemDesc}</p>
    <p>Cena: <span>${itemPrice} zł</span></p>
    <button data-item="${itemId}" class="menu-item-btn">Do koszyka</button>
  </div>
</li>`

const addItem = async (evt) => {
  const id = evt.target.dataset.item;

  await addToBasket(id, 1);
  const currentBasket = await getBasket();

  const basketCounter = document.getElementById('basketCounter');
  const count = Object.values(currentBasket);

  basketCounter.innerText = count.reduce((acc, curr) => acc + curr, 0);
}

export const appendMenuItem = (itemId, itemName, itemDesc, itemPrice) => {
  const template = menuItemTemplate(itemId, itemName, itemDesc, itemPrice);
  const element = templateToHtml(template);

  element[0].querySelector('.menu-item-btn').addEventListener('click', addItem);

  if (domMenu) {
    appendToDom(element, domMenu);
  }
}


