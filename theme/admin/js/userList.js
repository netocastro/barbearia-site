$(function () {

    $('.delete').on('click', function () {
        $('.confirm-delete').data('id', $(this).closest('tr').attr('id'));
    });

    $('.confirm-delete').on('click', function (e) {
        let _this = $(this);
        $.ajax({
            url: _this.data('url'),
            type: 'DELETE',
            dataType: 'JSON',
            data: 'id=' + $('.confirm-delete').data('id'),
            success: function (data) {
                console.log(data);
                if (data.deletedUser) {
                    $(`#${$('.confirm-delete').data('id')}`).fadeOut().remove();
                }
                if (data.userError) {
                    if (!$('#alert-message').length) {
                        $('#header').after(`
                                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert" id="alert">
                                      <strong id="alert-message">${data.userError}</strong>
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                          `).fadeIn();
                    }
                    $('#modal').modal('hide');
                    window.location.href = '#header';
                }
            },
            error: function (error) {
                if (error) {
                    if (!$('#alert-message').length) {
                        $('#header').after(`
                                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert" id="alert">
                                      <strong id="alert-message">${error.responseText}</strong>
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                          `).fadeIn();
                    }
                    $('#modal').modal('hide');
                    window.location.href = '#header';
                }
                console.log(error.responseText);
            }
        });
    });
});