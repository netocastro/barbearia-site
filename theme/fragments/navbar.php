<!-- se pagina diferente de home entao tirar transparente da barra de navegacao -->
<nav class="navbar navbar-expand-md navbar-dark align-items-center bg-normal" id="header">
    <div class="container">
        <a class="navbar-brand" href="<?= $route->route('web.home') ?>"><img src="<?= url('cdn/assets/images/logo/logo.png'); ?> " class="logo" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item mt-1">
                    <a class="nav-link text-light h5 <?= ($route->isCurrentRoute('web.home') ? 'active' : '') ?>" href="<?= $route->route('web.home') ?>">HOME</a>
                </li>
                <li class="nav-item mt-1">
                    <a class="nav-link text-light h5 <?= ($route->isCurrentRoute('web.about') ? 'active' : '') ?>" href="<?= $route->route('web.about') ?>">SOBRE</a>
                </li>
                <li class="nav-item mt-1">
                    <a class="nav-link text-light h5 <?= ($route->isCurrentRoute('web.scheduling') ? 'active' : '') ?>" href="<?= $route->route('web.scheduling') ?>">AGENDAMENTOS</a>
                </li>
                <!-- <li class="nav-item mt-1">
                    <a class="nav-link text-light h5 <?= ($route->isCurrentRoute('web.blog') ? 'active' : '') ?>" href="<?= $route->route('web.blog') ?>">BLOG</a>
                </li>
                
               <li class="nav-item">
                    <a class="nav-link text-light h5 mt-1<?= ($route->isCurrentRoute('web.units') ? 'active' : '') ?>" 
                    href="<?= $route->route('web.units') ?>">UNIDADES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light h5 mt-1<?= ($route->isCurrentRoute('web.franchise') ? 'active' : '') ?> " 
                    href="<?= $route->route('web.franchise') ?>">FRANQUIA</a>
                </li> -->
                <li class="nav-item mt-1">
                    <a class="nav-link text-light h5 <?= ($route->isCurrentRoute('web.contact') ? 'active' : '') ?>" href="<?= $route->route('web.contact') ?>">CONTATO</a>
                </li>
                <?php if (!isset($_SESSION['user_id'])) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user h4"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-xxl-end bg-transparent border-0" aria-labelledby="navbarDropdown">
                            <li class="nav-item">
                                <a class="dropdown-item h5 text-light " href="<?= $route->route('web.login') ?>">LOGIN</a>
                            </li>
                            <li class="nav-item">
                                <a class="dropdown-item h5 text-light" href="<?= $route->route('web.register') ?>">REGISTRO</a>
                            </li>
                        </ul>
                    </li>
                <?php else : ?>
                    <li class="nav-item dropdown" style="padding-top: 2px;">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="h4 text-light active"><?= $navbarUser->nick ?></span>
                        </a>
                        <ul class="dropdown-menu bg-normal border-0" aria-labelledby="navbarDropdown">
                            <li class="nav-item">
                                <a class="dropdown-item h5 text-light" href="<?= $route->route('admin.home') ?>">PAINEL</a>
                            </li>
                            <li class="nav-item">
                                <a class="dropdown-item h5 text-light" href="<?= $route->route('web.logout') ?>">LOGOUT</a>
                            </li>
                        </ul>
                    </li>

                <?php endif; ?>
            </ul>
        </div>

    </div>
</nav>