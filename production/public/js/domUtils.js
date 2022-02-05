export const templateToHtml = (template) => {
  const dom = new DOMParser().parseFromString(template, 'text/html');

  return dom.body.childNodes;
}

export const appendToDom = (element, root) => {
  if (element instanceof Node) {
    root.appendChild(element);
  } else {
    element.forEach((el) => {
      root.appendChild(el);
    });
  }
}