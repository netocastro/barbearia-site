<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark d-none" style="width: 240px; height: 100vh;" id="navbarDefault">
    <a href="<?= $route->route('web.home') ?>" class=" text-center text-white text-decoration-none">
        <span class="fs-4">Salão Ideal</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item  p-0">
            <a href="<?= $route->route('admin.home') ?>" class="nav-link  fs-5 <?= ($route->isCurrentRoute('admin.home') ? 'bg-warning text-dark' : '') ?>" aria-current="page">
                Home
            </a>
        </li>
        <li class="nav-item p-0">
            <a href="<?= $route->route('admin.contactList') ?>" class=" nav-link fs-5 <?= ($route->isCurrentRoute('admin.contactList') ? 'bg-warning text-dark' : '') ?>">
                Contatos
            </a>
        </li>
        <li class="nav-item p-0">
            <a href="<?= $route->route('admin.schedulingList') ?>" class="nav-link fs-5 <?= ($route->isCurrentRoute('admin.schedulingList') ? 'bg-warning text-dark' : '') ?>">
                Agenda
            </a>
        </li>
        <li class="nav-item p-0">
            <a href="<?= $route->route('admin.userList') ?>" class="nav-link fs-5 <?= ($route->isCurrentRoute('admin.userList') ? 'bg-warning text-dark' : '') ?>">
                Clientes
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>mdo</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item submenu" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="<?= $route->route('web.logout') ?>">Sign out</a></li>
        </ul>
    </div>
</div>