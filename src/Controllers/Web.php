<?php

namespace Source\Controllers;

use League\Plates\Engine;
use Source\Models\Service;
use Source\Models\User;
use Stonks\Router\Router;

class Web
{
    private Router $route;
    private Engine $view;

    public function __construct($route)
    {
        $this->view = Engine::create(dirname(__DIR__, 2) . "/theme", "php");
        $this->route = $route;
        $this->view->addData(['navbarUser' => (isset($_SESSION['user_id']) ? (new User())->findById($_SESSION['user_id']) : '')]);
        $this->view->addData(['route' => $this->route]);
    }

    public function home()
    {
        echo $this->view->render("home", [
            "title" => "Home"
        ]);
    }

    public function contact()
    {
        echo $this->view->render("contact", [
            "title" => "Contato"
        ]);
    }

    public function about()
    {
        echo $this->view->render("about", [
            "title" => "Sobre",
            "route" => $this->route
        ]);
    }

    public function blog()
    {
        echo $this->view->render("blog", [
            "title" => "Blog"
        ]);
    }

    public function franchise()
    {
        echo $this->view->render("franchise", [
            "title" => "Franquias"
        ]);
    }

    public function units()
    {
        echo $this->view->render("units", [
            "title" => "Unidades"
        ]);
    }

    public function scheduling()
    {
        echo $this->view->render("scheduling", [
            "title" => "Agendamentos",
            "services" => (new Service())->find()->fetch(true)
        ]);
    }

    public function login()
    {
        echo $this->view->render("login", [
            "title" => "Login"
        ]);
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        $this->route->redirect('web.home');
    }

    public function register()
    {
        echo $this->view->render("register", [
            "title" => "Register"
        ]);
    }
}
