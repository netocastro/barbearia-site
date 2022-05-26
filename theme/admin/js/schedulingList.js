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