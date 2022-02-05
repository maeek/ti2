export const getCookie = (name) => {
  const cookie = document.cookie.split('; ');
  for (let i = 0; i < cookie.length; i++) {
    const cookieName = cookie[i].split('=')[0];
    const cookieValue = cookie[i].split('=')[1];
    if (cookieName === name) {
      return cookieValue;
    }
  }
  return null;
}
