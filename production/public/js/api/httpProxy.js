export const baseUrl = ''

export const httpGet = (url, options = {}) => {
  return fetch(`${baseUrl}${url}`, {
    ...options,
    credentials: 'include',
    headers: {
      'Accept': 'application/json',
      'Content-Type': 'application/json'
    }
  })
  .catch(error => {
    console.error(error);
  });
};

export const httpPost = (url, options = {}) => {
  return fetch(`${baseUrl}${url}`, {
    ...options,
    body: JSON.stringify(options.body),
    method: 'POST',
    credentials: 'include',
    headers: {
      'Accept': 'application/json',
      'Content-Type': 'application/json'
    }
  })
  .catch(error => {
    console.error(error);
  });
};

export const httpDelete = (url, options = {}) => {
  return fetch(`${baseUrl}${url}`, {
    ...options,
    body: JSON.stringify(options.body),
    method: 'DELETE',
    credentials: 'include',
    headers: {
      'Accept': 'application/json',
      'Content-Type': 'application/json'
    }
  })
  .catch(error => {
    console.error(error);
  });
};

