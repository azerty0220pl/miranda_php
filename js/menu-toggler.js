const toggler = document.querySelector('.toggler');
const menu = document.querySelector('.menu');

toggler.addEventListener('click', () => {
    if(menu.classList.contains("hidden")) {
        menu.classList.remove('hidden');
        toggler.firstElementChild.src = './assets/icons/x-mark.svg';
    }
    else{
        menu.classList.add('hidden');
        toggler.firstElementChild.src = './assets/icons/bars.svg';
    }
})