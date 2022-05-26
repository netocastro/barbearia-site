"use strict";

$(function () {
  $('.readContact').on('click', function (e) {
    var _this = $(this);

    $('#read-message').html($(this).closest('tr').find('.name').html() + ', ' + $(this).closest('tr').find('.email').html());
    $('.message').html($(this).closest('tr').find('.text_email').html());
    $.ajax({
      url: _this.data('url'),
      type: 'POST',
      dataType: 'JSON',
      data: "id=" + _this.closest('tr').attr('id'),
      success: function success(data) {
        $('#' + data).css("font-weight", "");
        console.log(data);
      },
      error: function error(_error) {
        console.log(_error.responseText);
      }
    });
  });
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
        if (data.deletedContact) {
          $("#".concat($('.confirm-delete').data('id'))).fadeOut().remove();
        }
      },
      error: function error(_error2) {
        console.log(_error2.responseText);
      }
    });
  });
});