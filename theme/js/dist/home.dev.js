"use strict";

$(function () {
  if (window.scrollY == 0) {
    $('#header').removeClass('menuFixo');
    $('#header').addClass('bg-transparent');
    $('.dropdown-menu').removeClass('bg-normal');
    $('.dropdown-menu').addClass('bg-transparent');
  }

  if (window.scrollY > 0) {
    $('#header').removeClass('bg-transparent');
    $('#header').addClass('menuFixo');
    $('.dropdown-menu').removeClass('bg-transparent');
    $('.dropdown-menu').addClass('bg-normal');
  }

  window.addEventListener('scroll', function () {
    if (window.scrollY > 0) {
      $('#header').removeClass('bg-transparent');
      $('#header').addClass('menuFixo');
      $('.dropdown-menu').removeClass('bg-transparent');
      $('.dropdown-menu').addClass('bg-normal');
      return false;
    } // > 0 ou outro valor desejado


    if (window.scrollY == 0 && !$('#header').hasClass("bg-transparent")) {
      $('#header').removeClass('menuFixo');
      $('#header').addClass('bg-transparent');
      $('.dropdown-menu').removeClass('bg-normal');
      $('.dropdown-menu').addClass('bg-transparent');
      return false;
    }
  });
});