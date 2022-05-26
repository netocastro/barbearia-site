<!-- se pagina diferente de home entao tirar transparente da barra de navegacao -->
<nav class="navbar navbar-expand-md navbar-dark align-items-center bg-normal" id="header">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="<?= url('cdn/assets/images/logo/logo.png'); ?> " class="logo" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item mt-1">
                    <a class="nav-link text-light h5 <?= ($route->isCurrentRoute('admin.home') ? 'active' : '') ?>" href="<?= $route->route('admin.home') ?>">HOME</a>
                </li>
                <li class="nav-item mt-1">
                    <a class="nav-link text-light h5 <?= ($route->isCurrentRoute('admin.contactList') ? 'active' : '') ?>" href="<?= $route->route('admin.contactList') ?>">CONTATOS</a>
                </li>
                <li class="nav-item mt-1">
                    <a class="nav-link text-light h5 <?= ($route->isCurrentRoute('admin.schedulingList') ? 'active' : '') ?>" href="<?= $route->route('admin.schedulingList') ?>">AGENDAMENTOS</a>
                </li>
                <li class="nav-item mt-1">
                    <a class="nav-link text-light h5 <?= ($route->isCurrentRoute('admin.userList') ? 'active' : '') ?>" href="<?= $route->route('admin.userList') ?>">USUARIOS</a>
                </li>
            </ul>
        </div>
    </div>
</nav>