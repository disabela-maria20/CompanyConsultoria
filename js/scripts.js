$(document).ready(function() {
    $("#owl-demo").owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        items: 1,
        dots: false,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true
    });

    $("#marcas").owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        items: 5,
        dots: false,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        navText: ['<i class="fa fa-angle-left seta-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right seta-right" aria-hidden="true"></i>'],
        smartSpeed: 2000,
        autoHeight: false,
        autoplay: true,
        responsive: {
            0: {
                items: 2,
            },
            576: {
                items: 4,
            },
            992: {
                items: 4,
            },
            1200: {
                items: 5,
            }
        }
    });
});



function Abrir(){
    let linha1 = document.getElementById('linha-1')
    linha1.classList.toggle('linha1')

    let linha2 = document.getElementById('linha-2')
    linha2.classList.toggle('linha2')  

    let menu = document.getElementById('menu')
    menu.classList.toggle('active-menu')
    
    let body = document.body
    body.classList.toggle('overflow-hidden')
}
