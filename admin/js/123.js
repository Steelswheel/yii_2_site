$(document).ready(function() {
    $('.sidebar-header').click(function(){
        if ( $('.sidebar-toggle').hasClass('open') ) {
            $('.sidebar-toggle').slideUp().removeClass('open');
        } else {
            $('.sidebar-toggle').slideDown().addClass('open');
        }
    });

    //MOBILE MENU
    $('.hamburger').click(function() {
        if ( !$(this).hasClass('is-active') ) {
            $(this).addClass('is-active');
            $('.main-menu > ul').css('left','0');
            $('body').addClass('menu');
        } else {
            $(this).removeClass('is-active');
            $('.main-menu > ul').css('left','');
            $('body').removeClass('menu');
        }
    });
});

document.querySelector('.hamburger')
    .addEventListener('click', function () {
        if (this.classList.contains('is-active')) {
            document.querySelector('.hamburger').classList.remove('is-active');
            document.querySelector('.main-menu > ul').style.left = '';
            document.querySelector('body').classList.remove('menu');

        } else {
            document.querySelector('.hamburger').classList.add('is-active');
            document.querySelector('.main-menu > ul').style.left = 0;
            document.querySelector('body').classList.add('menu');
        }
    })


document.querySelector('.sidebar-header')
    .addEventListener('click', function () {
        if (this.classList.contains('sidebar-toggle')) {
            document.querySelector('.sidebar-toggle').classList.remove('open');
        } else {
            document.querySelector('.sidebar-toggle').classList.add('open');
        }
    })






document.querySelector('.hamburger').classList.remove('is-active'); document.querySelector('.main-menu > ul').style.left = ''; document.querySelector('body').classList.remove('menu');


document.querySelector('.hamburger').classList.add('is-active'); document.querySelector('.main-menu > ul').classList.left = 0; document.querySelector('body').classList.add('menu');