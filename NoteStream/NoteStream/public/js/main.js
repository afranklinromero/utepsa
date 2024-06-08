// get el boton para subir
const backToTopBtn = document.getElementById('backToTopBtn');

// Funcion para mostrar el boton
function showButton() {
    backToTopBtn.style.display = 'block';
    setTimeout(() => backToTopBtn.classList.add('show'), 10);
}

// Funcion para esconder el boton
function hideButton() {
    backToTopBtn.classList.remove('show');
    setTimeout(() => backToTopBtn.style.display = 'none', 300);
}

// Mostrar el boton cuando el usuario baja del titulo 
window.onscroll = function() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        if (!backToTopBtn.classList.contains('show')) {
            showButton();
        }
    } else {
        if (backToTopBtn.classList.contains('show')) {
            hideButton();
        }
    }
};

// Animacion para subir
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

document.querySelectorAll(".scrollLink").forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();

        const targetID = this.getAttribute('href').substring(1);
        const targetElement = document.getElementById(targetID);

        targetElement.scrollIntoView({
            behavior: 'smooth'
        });
    });
});
