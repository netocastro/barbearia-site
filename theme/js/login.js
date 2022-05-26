$(function () {

    navbar();
    $('.footer').addClass('fixed-bottom');

    $('form').on('submit', function (e) {
        e.preventDefault();

        let _this = $(this);

        $.ajax({
            url: _this.attr('action'),
            type: _this.attr('method'),
            dataType: _this.data('type'),
            data: _this.serialize(),
            beforeSend: function () {
                _this.find('.load').removeClass('d-none').addClass('d-flex');
            },
            success: function (data) {
                validateFields(data, _this);
                if (data.success) {
                    window.location.href = home;
                }
                console.log(data);
            },
            error: function (error) {
                console.log(error.responseText);
            }
        }).always(function () {
            _this.find('.load').removeClass('d-flex').addClass('d-none');
        });
    });
});