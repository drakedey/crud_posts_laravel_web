console.log('hello world');

const hiddenContent = document.querySelector("#hidden-content")
if(hiddenContent) {
  const element = document.querySelector('trix-editor');
  console.log(hiddenContent.textContent);
  element.editor.insertHTML(hiddenContent.textContent);
}