<?php $v->layout('_template'); ?>
<div class="my-3">
    <div class="row row-cols-1 row-cols-md-3 no-spaces">
        <div class="rol"></div>
        <div class="rol">
            <h1 class="text-center">Contato</h1>
            <hr>
            <form action="<?= $route->route('contact.store'); ?>" method="POST" data-type="json">
                <div class="form-floating mb-3">
                    <input type="text" id="name" name="name" placeholder="Name" class="form-control form-control-sm">
                    <label for="name">Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" id="email" name="email" placeholder="Email" class="form-control">
                    <label for="email">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="textarea" id="email_content" name="text_email" placeholder="Text" class="form-control" style="height: 100px">
                    <label for="text_email">Menssagem</label>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-warning">Enviar</button>
                    <div class="d-none justify-content-center mt-2 load">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="rol"></div>
    </div>

</div>

<?php $v->start('js'); ?>

<script src="<?= url('theme/js/contact.js'); ?>"></script>

<?php $v->end(); ?>