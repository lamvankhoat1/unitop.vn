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
        $(".sub-menu").slideToggle(300);
        $("ul li i.fa-chevron-down").toggleClass("rotate");
    })
})