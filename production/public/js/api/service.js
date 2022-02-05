import { httpGet, httpPost, httpDelete } from './httpProxy.js';

export const register = (data) => {
  return httpPost('/index.php?register', {
    body: data
  })
    .then(response => response.json());
};

export const getMenuItems = async () => {
  return httpGet('/index.php?menu')
    .then(response => response.json());
};

export const addToBasket = async (productId, quantity) => {
  return httpPost('/index.php?basket', {
    body: {
      productId,
      quantity
    }
  });
}

export const removeFromBasket = async (productId) => {
  return httpDelete('/index.php?basket', {
    body: {
      productId,
    }
  });
}
     
export const getBasket = async () => {
  return httpGet('/index.php?basket')
    .then(response => response.json());
}

export const login = (data) => {
  return httpPost('/index.php?login', {
    body: data
  })
    .then(response => response.json());
}

export const logout = () => {
  return httpPost('/index.php?logout');
}
