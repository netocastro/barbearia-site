<?php

namespace Source\Controllers\Admin;

use League\Plates\Engine;
use Source\Models\Contact;
use Source\Models\Service;
use Source\Models\User;
use Stonks\Router\Router;

class AdminController
{
    private Router $route;
    private Engine $view;

    public function __construct($route)
    {
        $this->view = Engine::create(dirname(__DIR__, 3) . "/theme/admin", "php");
        $this->route = $route;
        $this->view->addData(['navbarUser' => (isset($_SESSION['user_id']) ? (new User())->findById($_SESSION['user_id']) : '')]);
        $this->view->addData(['route' => $this->route]);
    }

    public function home()
    {
        echo $this->view->render("adminHome", [
            "title" => "Admin Home"
        ]);
    }

    public function contactList()
    {
        echo $this->view->render("contactList", [
            "title" => "Admin Contatos",
            "contacts" => (new Contact())->find()->fetch(true)
        ]);
    }

    public function schedulingList()
    {
        echo $this->view->render("schedulingList", [
            "title" => "Admin Agendamentos"
        ]);
    }

    public function userList()
    {
        echo $this->view->render("userList", [
            "title" => "Admin Usuarios",
            "users" => (new User())->find()->fetch(true)
        ]);
    }
}
