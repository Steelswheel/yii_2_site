let btnOpenMenu = document.querySelector('.onShowMobileMenu');

if (btnOpenMenu) {
    btnOpenMenu.addEventListener('click',() => {
        document.querySelector('body').classList.add('show-mobile-menu');
        return false;
    })
}

let bgCloseMenu = document.querySelector('.mobile-nav');

if (bgCloseMenu) {
    bgCloseMenu.addEventListener('click',() => {
        document.querySelector('body').classList.remove('show-mobile-menu');
        return false;
    })
}