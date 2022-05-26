"use strict";

$(function () {
  $('.delete').on('click', function () {
    $('.confirm-delete').data('id', $(this).closest('tr').attr('id'));
  });
  $('.confirm-delete').on('click', function (e) {
    var _this = $(this);

    $.ajax({
      url: _this.data('url'),
      type: 'DELETE',
      dataType: 'JSON',
      data: 'id=' + $('.confirm-delete').data('id'),
      success: function success(data) {
        if (data.deletedUser) {
          $("#".concat($('.confirm-delete').data('id'))).fadeOut().remove();
        }
      },
      error: function error(_error) {
        console.log(_error.responseText);
      }
    });
  });
});