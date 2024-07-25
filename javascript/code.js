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

document.addEventListener('DOMContentLoaded', function() {
  // Ajoutez ici les scripts nécessaires
  // Par exemple, vous pouvez ajouter un effet de défilement lisse pour la navigation
  const links = document.querySelectorAll('nav ul li a');

  for (const link of links) {
      link.addEventListener('click', smoothScroll);
  }

  function smoothScroll(event) {
      event.preventDefault();
      const targetId = event.currentTarget.getAttribute('href').substring(1);
      const targetElement = document.getElementById(targetId);

      if (targetElement) {
          window.scrollTo({
              top: targetElement.offsetTop,
              behavior: 'smooth'
          });
      }
  }
});
