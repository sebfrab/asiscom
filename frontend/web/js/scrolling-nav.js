//jQuery to collapse the navbar on scroll
$(window).scroll(function() {
    if ($(window).width() > 767){
        if ($(".navbar").offset().top > 100) {
            $(".navbar-fixed-top").addClass("top-nav-collapse");
            $(".navbar-fixed-top").addClass("nav-superior-black");
            $("#img-superior").attr("src", "../images/logo-2.png");
        } else {
            $(".navbar-fixed-top").removeClass("top-nav-collapse");
            $(".navbar-fixed-top").addClass("nav-superior-transparent");
            $(".navbar-fixed-top").removeClass("nav-superior-black");
            $("#img-superior").attr("src", "../images/logo-2.png");
        }
    }
});

//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});
if ($(window).width() < 768){
        $(".navbar-fixed-top").addClass("nav-superior-black");
        $("#img-superior").attr("src", "../images/logo-2.png");   
        $(".navbar-fixed-top").addClass("menu-collapse-site");
    }
$(window).on('resize', function(){
    if ($(window).width() < 768){
        $(".navbar-fixed-top").addClass("nav-superior-black");
        $("#img-superior").attr("src", "../images/logo-2.png");
        $(".navbar-fixed-top").addClass("menu-collapse-site");
    }else{
        $(".navbar-fixed-top").removeClass("menu-collapse-site");
        if ($(window).width() > 767){
            if ($(".navbar").offset().top > 100) {
                $(".navbar-fixed-top").addClass("top-nav-collapse");
                $(".navbar-fixed-top").addClass("nav-superior-black");
                $("#img-superior").attr("src", "../images/logo-2.png");
            } else {
                $(".navbar-fixed-top").removeClass("top-nav-collapse");
                $(".navbar-fixed-top").addClass("nav-superior-transparent");
                $(".navbar-fixed-top").removeClass("nav-superior-black");
                $("#img-superior").attr("src", "../images/logo-2.png");
            }
        }
    }
});