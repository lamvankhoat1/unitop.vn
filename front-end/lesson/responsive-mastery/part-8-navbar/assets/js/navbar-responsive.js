$(document).ready(function () {
    let navbarMobile = $("nav#mobile")
    navbarMobile.hide(); // default;
    $("#bar-button-toggle").click(function () {
        navbarMobile.stop().slideToggle(300)
    })
    $(window).resize(function () {
        navbarMobile.slideUp()
    })
    $(window).scroll(function () {
        navbarMobile.slideUp()
    })
    // sub menu
    $("ul li i.fa-chevron-down").click(function () {
        $(this).parent().children(".sub-menu").slideToggle(300);
        $(this).toggleClass("rotate");
    })
})