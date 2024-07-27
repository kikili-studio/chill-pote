document.addEventListener('DOMContentLoaded', function() {
    const myButton = document.getElementById('myButton');
    const myText = document.getElementById('myText');
    const myForm = document.getElementById('myForm');
    const elements = document.querySelectorAll('.myElement');

    function getRandomColor() {
        return '#' + Math.floor(Math.random() * 16777215).toString(16).padStart(6, '0');
    }

    if (myButton && myText) {
        myButton.addEventListener('click', function() {
            myText.textContent = 'Le texte a été modifié!';
        });
    }

    if (myForm) {
        myForm.addEventListener('submit', function(event) {
            const emailInput = document.getElementById('email');
            if (emailInput && emailInput.value.trim() === '') {
                event.preventDefault();
                alert('Veuillez renseigner votre adresse e-mail.');
            }
        });
    }

    if (elements.length > 0) {
        setInterval(function() {
            elements.forEach(function(element) {
                element.style.color = getRandomColor();
            });
        }, 2000);
    }

    const links = document.querySelectorAll('nav ul li a');
    if (links.length > 0) {
        links.forEach(function(link) {
            link.addEventListener('click', smoothScroll);
        });
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
              
