document.addEventListener('DOMContentLoaded', function(){
    eventListeners();

    darkMode();
})


function darkMode(){

    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme : dark)');
    const botonDarkMode = document.querySelector('.dark-mode-boton');


    if(prefiereDarkMode.matches){
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    } 

    prefiereDarkMode.addEventListener('change', function(){
        if(prefiereDarkMode.matches){
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        } 
    })

    botonDarkMode.addEventListener('click',onDark);
}

function onDark(){
    document.body.classList.toggle('dark-mode');
}

function eventListeners(){
        const mobileMenu = document.querySelector('.mobile-menu');

        mobileMenu.addEventListener('click',navegacionResponsive);
}

function navegacionResponsive(){
    const navegacion = document.querySelector('.navegacion');

    if(navegacion.classList.contains("mostrar")){
        navegacion.classList.remove('mostrar');
    } else {
        navegacion.classList.add('mostrar');
        
    }
    // navegacion.classList.toggle('mostrar'); es lo mismo que el if de arriba pero es para un poco mas avanzados
}
