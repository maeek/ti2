import { getCookie } from './api/cookies.js';
import { getBasket, getMenuItems } from './api/service.js';
import { appendToDom, templateToHtml } from './domUtils.js';
import { appendMenuItem } from './menu.js';

const domContent = document.getElementById('content');
const basketCounter = document.getElementById('basketCounter');

// appendMenuItem(1, 'Kotlet z kurczakiem', 'Kotlet z kurczakiem, szynka, cebula, pieprz, pieprz czarny, oliwa z oliwek', '15.00');

const fetchItems = async () => {
  const items = await getMenuItems();

  items.forEach(item => {
    appendMenuItem(item.id, item.name, item.description, item.price);
  });
}

const hideLogin = () => {
  const login = document.getElementById('loginHref');
  const register = document.getElementById('regHref');
  login.remove();
  register.remove();

  appendToDom(
    templateToHtml(`<li><a href="${location.href.includes('pages/') ? '' : 'pages/'}logout.html">Wyloguj</a></li>`),
    document.getElementById('page-nav')
    );
}

if (getCookie('username')) {
  hideLogin();

  const currentBasket = await getBasket();
  const basketCounter = document.getElementById('basketCounter');
  const count = Object.values(currentBasket);
  basketCounter.innerText = count.reduce((acc, curr) => acc + curr.quantity, 0);
}