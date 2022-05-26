<div class="d-flex flex-column flex-shrink-0  text-white bg-dark d-none" style=" width: 6rem; height: 100vh; color: white !important;" id="navbarMini">
    <a href="/" class="d-block p-3 link-dark text-decoration-none" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
        <svg class="bi" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="visually-hidden">Icon-only</span>
    </a>
    <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
        <li class="nav-item   <?= ($route->isCurrentRoute('admin.home') ? 'bg-warning' : '') ?>">
            <a href="<?= $route->route('admin.home') ?>" aria-current="page" class="nav-link text-light fs-5 <?= ($route->isCurrentRoute('admin.home') ? 'text-dark' : '') ?>">
                <i class="fa fa-home"></i>
            </a>
        </li>
        <hr class=" m-0">
        <li class="nav-item text-white <?= ($route->isCurrentRoute('admin.contactList') ? 'bg-warning' : '') ?>">
            <a href="<?= $route->route('admin.contactList') ?>" aria-current="page" class="nav-link text-light fs-5 <?= ($route->isCurrentRoute('admin.contactList') ? 'text-dark' : '') ?>">
                <i class="fas fa-address-book"></i>
            </a>
        </li>
        <hr class=" m-0">
        <li class="nav-item text-white <?= ($route->isCurrentRoute('admin.schedulingList') ? 'bg-warning' : '') ?>">
            <a href="<?= $route->route('admin.schedulingList') ?>" aria-current="page" class="nav-link text-light fs-5 <?= ($route->isCurrentRoute('admin.schedulingList') ? 'text-dark' : '') ?>">
                <i class="fas fa-calendar"></i>
            </a>
        </li>
        <hr class=" m-0">
        <li class="nav-item text-white <?= ($route->isCurrentRoute('admin.userList') ? 'bg-warning' : '') ?>">
            <a href="<?= $route->route('admin.userList') ?>" aria-current="page" class="nav-link text-light fs-5 <?= ($route->isCurrentRoute('admin.userList') ? 'text-dark' : '') ?>">
                <i class="fas fa-users"></i>
            </a>
        </li>
        <hr class=" m-0">
    </ul>

    <div class="dropdown py-3">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle">
            <strong>Administrador</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="<?= $route->route('web.logout') ?>">Sign out</a></li>
        </ul>
    </div>
</div>