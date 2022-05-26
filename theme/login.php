<?php $v->layout('_template'); ?>

<?php $v->start('css'); ?>
<?php $v->end(); ?>

<div class="my-5">
    <h1 class="text-center mt-3">Login(Por enquanto sem frontend)</h1>
    <div class="row mb-3 no-spaces">
        <div class="col-1 col-sm-3 col-md-3 col-lg-4"></div>
        <div class="col-10 col-sm-6 col-md-6 col-lg-4">
            <form action="<?= $route->route('request.login'); ?>" method="post" data-type="JSON">

                <input type="email" name="email" placeholder="Email" class="form-control mb-2">
                <input type="password" name="password" placeholder="Senha" class="form-control mb-2">
                <button type="submit" class="btn btn-primary">Login</button>
                <div class="d-none justify-content-center mt-2 load">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>  

            </form>
        </div>
        <div class="col"></div>
    </div>
</div>

<?php $v->start('js'); ?>

<script>
    let home = '<?= (isset($_SESSION['user_id'])  ? $route->route('admin.home') : $route->route('web.home')) ?>';
</script>

<script src="<?= url('theme/js/login.js'); ?>"></script>

<?php $v->end(); ?>