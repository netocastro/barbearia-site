"use strict";

$(function () {
  navbar();
  $('.footer').addClass('fixed-bottom');
  $('form').on('submit', function (e) {
    e.preventDefault();

    var _this = $(this);

    $.ajax({
      url: _this.attr('action'),
      type: _this.attr('method'),
      dataType: _this.data('type'),
      data: _this.serialize(),
      beforeSend: function beforeSend() {
        _this.find('.load').removeClass('d-none').addClass('d-flex');
      },
      success: function success(data) {
        validateFields(data, _this);
        console.log(data);
      },
      error: function error(_error) {
        console.log(_error.responseText);
      }
    }).always(function () {
      _this.find('.load').removeClass('d-flex').addClass('d-none');
    });
  });
});