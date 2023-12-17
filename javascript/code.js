const myButton = document.getElementById('myButton');
const myText = document.getElementById('myText');

myButton.addEventListener('click', function() {
  myText.textContent = 'Le texte a été modifié!';
});

const myForm = document.getElementById('myForm');

myForm.addEventListener('submit', function(event) {
  const emailInput = document.getElementById('email');
  if (emailInput.value === '') {
    event.preventDefault();
    alert('Veuillez renseigner votre adresse e-mail.');
  }
});

const elements = document.querySelectorAll('.myElement');

setInterval(function() {
  elements.forEach(function(element) {
    element.style.color = getRandomColor();
  });
}, 2000);

function getRandomColor() {
  return '#' + Math.floor(Math.random() * 16777215).toString(16);
}
