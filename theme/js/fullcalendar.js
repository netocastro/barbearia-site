$(function () {

    navbar();

    $('#form-scheduling').on('submit', function (e) {
        e.preventDefault();

        let _this = $(this);

        $.ajax({
            url: _this.attr('action'),
            type: _this.attr('method'),
            dataType: _this.data('type'),
            data: _this.serialize(),
            success: function (data) {
                if (data.whithoutLogin) {
                    if (!$('#alert-message').length) {
                        $('#header').after(`
                                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert" id="alert">
                                      <strong id="alert-message">${data.whithoutLogin}</strong><a class="alert-link" href="${login}"> Logar</a>
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                          `).fadeIn();
                    }
                    $('#modal').modal('hide');
                    window.location.href = '#header';
                }
                if (data.success) {
                    window.location.href = agendamentos;
                }
                console.log(data);
            },
            error: function (error) {
                console.log(error.responseText);
            }
        });
    });

    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridWeek',
        timeZone: 'America/Sao_Paulo',
        headerToolbar: false,
        headerToolbar: {
            start: '', // will normally be on the left. if RTL, will be on the right
            center: 'title',
            end: 'dayGridMonth' // will normally be on the right. if RTL, will be on the left
        },
        footerToolbar: {
            start: 'prev', // will normally be on the left. if RTL, will be on the right
            center: '',
            end: 'next' // will normally be on the right. if RTL, will be on the left
        },
        buttonText: {
            today: 'Hoje',
            month: 'mês',
            week: 'semana',
            day: 'dia',
            list: 'lista'
        },
        slotMinTime: '07:00:00',
        slotMaxTime: '18:00:00',
        dateClick: function (info) {
            //alert('Clicked on: ' + info.dateStr);
            if (info.view.type == 'dayGridMonth') {
                calendar.changeView('dayGridWeek', info.dateStr);
            }

            if (info.view.type == 'dayGridWeek') {
                calendar.changeView('timeGrid', info.dateStr);
            }

            if (info.view.type == 'timeGrid') {

                let data = new Date(info.dateStr);

                $('input[name=data]').val(info.dateStr);
                $('#data').html(`${(data.getDate() < 10 ? '0' + data.getDate()  : data.getDate())}/
                    ${(data.getMonth() < 10 ? '0' + (data.getMonth() + 1) : (data.getMonth() + 1))}/
                    ${data.getFullYear()}
                `);

                $('#hora').html(`
                ${(data.getHours() < 10 ? '0' + data.getHours():data.getHours())}:
                ${(data.getMinutes() < 10 ? '0' + data.getMinutes():data.getMinutes())}`);

                var myModal = new bootstrap.Modal(document.getElementById('modal'), {
                    keyboard: false
                });
                myModal.show();
            }

            // change the day's background color just for fun
            // -----  info.dayEl.style.backgroundColor = 'gray';
        },

        events: myEvents,
        locale: 'pt-br'
    });
    calendar.render();

    if (window.innerWidth < 420) {
        $('.footer').addClass('fixed-bottom');
        return false;
    }
    if (window.innerWidth > 420) {
        $('.footer').removeClass('fixed-bottom');
        return false;
    }

    /**
     * Metodo on resize nao funciona nem o winow.addeventlistener       <------
     */
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
