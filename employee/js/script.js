//(function(i, s, o, g, r, a, m) {
//    i['GoogleAnalyticsObject'] = r;
//    i[r] = i[r] || function() {
//        (i[r].q = i[r].q || []).push(arguments);
//    }, i[r].l = 1 * new Date();
//    a = s.createElement(o), m = s.getElementsByTagName(o)[0];
//    a.async = 1;
//    a.src = g;
//    m.parentNode.insertBefore(a, m);
//});

$("body").on("contextmenu", function(e) {
    return false;
});
$(document).keydown(function(e) {
    if (e.ctrlKey && (e.keyCode === 67 || e.keyCode === 86 || e.keyCode === 85 || e.keyCode === 117)) {
        return false;
    }
    if (e.which === 123) {
        return false;
    }
    if (e.metaKey) {
        return false;
    }
    if (e.ctrlKey && e.shiftKey && e.keyCode === 73) {
        return false;
    }
    if (e.ctrlKey && e.shiftKey && e.keyCode === 74) {
        return false;
    }
    if (e.keyCode === 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
        return false;
    }
    if (e.keyCode === 224 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
        return false;
    }
    if (e.ctrlKey && e.keyCode === 85) {
        return false;
    }
    if (event.keyCode === 123) {
        return false;
    }
});
(function($) {
    "use strict";
    var $main_nav = $('#main-nav');
    var $toggle = $('.toggle');
    var defaultOptions = {
        disableAt: false,
        customToggle: $toggle,
        levelSpacing: 40,
        navTitle: 'Dactorapp',
        levelTitles: true,
        levelTitleAsBack: true,
        pushContent: '#container',
        insertClose: 2
    };
    var Nav = $main_nav.hcOffcanvasNav(defaultOptions);
    $('.landing-slider').slick({
        dots: true,
        autoplay: true,
        nextArrow: false,
        prewArrow: false
    });
    $('.top-doctors').slick({
        infinite: false,
        dots: false,
        arrows: false,
        speed: 300,
        autoplay: false,
        slidesToShow: 2.2,
        slidesToScroll: 1
    });
    $('.available-doctor').slick({
        infinite: false,
        dots: false,
        arrows: false,
        speed: 300,
        autoplay: false,
        slidesToShow: 1.2,
        slidesToScroll: 1
    });
    $('.recent-doctors').slick({
        infinite: false,
        dots: false,
        arrows: false,
        speed: 300,
        autoplay: false,
        slidesToShow: 2.2,
        slidesToScroll: 1
    });
})(jQuery);