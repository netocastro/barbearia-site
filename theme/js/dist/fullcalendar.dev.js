"use strict";

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

$(function () {
  var _ref;

  navbar();
  $('#form-scheduling').on('submit', function (e) {
    e.preventDefault();

    var _this = $(this);

    $.ajax({
      url: _this.attr('action'),
      type: _this.attr('method'),
      dataType: _this.data('type'),
      data: _this.serialize(),
      success: function success(data) {
        if (data.whithoutLogin) {
          if (!$('#alert-message').length) {
            $('#header').after("\n                                <div class=\"alert alert-danger alert-dismissible fade show text-center\" role=\"alert\" id=\"alert\">\n                                      <strong id=\"alert-message\">".concat(data.whithoutLogin, "</strong><a class=\"alert-link\" href=\"").concat(login, "\"> Logar</a>\n                                      <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>\n                                </div>\n                          ")).fadeIn();
          }

          $('#modal').modal('hide');
          window.location.href = '#header';
        }

        if (data.success) {
          window.location.href = agendamentos;
        }

        console.log(data);
      },
      error: function error(_error) {
        console.log(_error.responseText);
      }
    });
  });
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, (_ref = {
    initialView: 'dayGridWeek',
    timeZone: 'America/Sao_Paulo',
    headerToolbar: false
  }, _defineProperty(_ref, "headerToolbar", {
    start: '',
    // will normally be on the left. if RTL, will be on the right
    center: 'title',
    end: 'dayGridMonth' // will normally be on the right. if RTL, will be on the left

  }), _defineProperty(_ref, "footerToolbar", {
    start: 'prev',
    // will normally be on the left. if RTL, will be on the right
    center: '',
    end: 'next' // will normally be on the right. if RTL, will be on the left

  }), _defineProperty(_ref, "buttonText", {
    today: 'Hoje',
    month: 'mês',
    week: 'semana',
    day: 'dia',
    list: 'lista'
  }), _defineProperty(_ref, "slotMinTime", '07:00:00'), _defineProperty(_ref, "slotMaxTime", '18:00:00'), _defineProperty(_ref, "dateClick", function dateClick(info) {
    //alert('Clicked on: ' + info.dateStr);
    if (info.view.type == 'dayGridMonth') {
      calendar.changeView('dayGridWeek', info.dateStr);
    }

    if (info.view.type == 'dayGridWeek') {
      calendar.changeView('timeGrid', info.dateStr);
    }

    if (info.view.type == 'timeGrid') {
      var data = new Date(info.dateStr);
      $('input[name=data]').val(info.dateStr);
      $('#data').html("".concat(data.getDate() < 10 ? '0' + data.getDate() : data.getDate(), "/\n                    ").concat(data.getMonth() < 10 ? '0' + (data.getMonth() + 1) : data.getMonth() + 1, "/\n                    ").concat(data.getFullYear(), "\n                "));
      $('#hora').html("\n                ".concat(data.getHours() < 10 ? '0' + data.getHours() : data.getHours(), ":\n                ").concat(data.getMinutes() < 10 ? '0' + data.getMinutes() : data.getMinutes()));
      var myModal = new bootstrap.Modal(document.getElementById('modal'), {
        keyboard: false
      });
      myModal.show();
    } // change the day's background color just for fun
    // -----  info.dayEl.style.backgroundColor = 'gray';

  }), _defineProperty(_ref, "events", myEvents), _defineProperty(_ref, "locale", 'pt-br'), _ref));
  calendar.render();

  if (window.innerWidth < 420) {
    $('.footer').addClass('fixed-bottom');
    return false;
  }

  if (window.innerWidth > 420) {
    $('.footer').removeClass('fixed-bottom');
    return false;
  }

  $(window).on('resize', function () {
    if (window.innerWidth < 420) {
      $('.footer').addClass('fixed-bottom');
      return false;
    }

    if (window.innerWidth > 420) {
      calendar.currentData.options.headerToolbar.start = 'prev';
      console.log(calendar.currentData.options.headerToolbar.start);
      calendar.render();
      $('.footer').removeClass('fixed-bottom');
      return false;
    }
  });
});