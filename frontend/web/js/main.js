$(document).ready(function () {
  'use strict';
  /* ========================================================================
     Fullscreen burger menu
   ========================================================================== */
  $(".menu-trigger, .mobilenav").click(function () {
    $(".mobilenav").fadeToggle(500);
  });
  $(".menu-trigger, .mobilenav").click(function () {
    $(".top-menu").toggleClass("top-animate");
    $(".mid-menu").toggleClass("mid-animate");
    $(".bottom-menu").toggleClass("bottom-animate");
  });

  /* ========================================================================
     On click menu item animate to the section
   ========================================================================== */
  $(".mobilenav li, .back-to-top").on('click', function() {
    var target = $(this).data('rel');
    var $target = $(target);
    $('html, body').stop().animate({
        'scrollTop': $target.offset().top
    }, 900, 'swing');
  });

  /* Header Height Control
   ========================================================================== */
  var height = $(window).height();
  if(height<600) {
    height = 600;
  }
  $('header').css({
    'minHeight': 0,
    'maxHeight': 'none',
    'height': height
  });
  /* ========================================================================
   Header carousel
   ========================================================================== */
  $('.carousel').carousel({
    interval: 50000
  })

});