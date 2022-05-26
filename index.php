<?php

use Stonks\Router\Router;

require_once "vendor/autoload.php";

$route = new Router(BASE_PATH);

$route->namespace('Source\Controllers');

/**
 *  ------ FALTA FAZER VALIDACOES NOS CONTROLADORES SITE EM FAZE DE TESTE
 */

$route->group(null);
/**
 * Site User
 */
$route->get("/", "Web:home", "web.home");
$route->get("/contato", "Web:contact", "web.contact");
$route->get("/sobre", "Web:about", "web.about");
$route->get("/blog", "Web:blog", "web.blog");
$route->get("/franquias", "Web:franchise", "web.franchise");
$route->get("/unidades", "Web:units", "web.units");
$route->get("/agendamentos", "Web:scheduling", "web.scheduling");
$route->get("/login", "Web:login", "web.login");
$route->get("/logout", "Web:logout", "web.logout");
$route->get("/registro", "Web:register", "web.register");

$route->post("/saveScheduling", "Request:saveScheduling", "request.saveScheduling");
$route->post("/login", "Request:login", "request.login");
$route->post("/registro", "Request:register", "request.register");

/**
 * Site Admin
 */
$route->namespace('Source\Controllers\Admin');
$route->group('admin');

$route->get("/", "AdminController:home", "admin.home");
$route->get("/lista-contatos", "AdminController:contactList", "admin.contactList");
$route->get("/agendamentos", "AdminController:schedulingList", "admin.schedulingList");
$route->get("/lista-clientes", "AdminController:userList", "admin.userList");


$route->post("/contact", "Request:contact", "art.request.contact");

$route->post("/read-contact", "AdminControllerRequest:readContact", "adminRequest.readContact");
$route->post("/deleteContact", "Request:deleteContact", "adminRequest.deleteContact");

/**
 * ROTAS DA API
 */
$route->namespace('Source\Controllers\Api');
$route->group('api');

/**
 * Events
 */
$route->get("/event", "EventController:index", "event.index");
$route->get("/event/{event}", "EventController:show", "event.show");
$route->post("/event", "EventController:store", "event.store");
$route->put("/event/{event}", "EventController:update", "event.update");
$route->delete("/event/{event}", "EventController:delete", "event.delete");

/**
 * Services
 */
$route->get("/service", "ServiceController:index", "service.index");
$route->get("/service/{service}", "ServiceController:show", "service.show");
$route->post("/service", "ServiceController:store", "service.store");
$route->put("/service/{service}", "ServiceController:update", "service.update");
$route->delete("/service/{service}", "ServiceController:delete", "service.delete");

/**
 * Users
 */
$route->get("/user", "UserController:index", "user.index");
$route->get("/user/{user}", "UserController:show", "user.show");
$route->post("/user", "UserController:store", "user.store");
$route->put("/user/{user}", "UserController:update", "user.update");
$route->delete("/user/{user}", "UserController:delete", "user.delete");

/**
 * Contacts
 */
$route->get("/contact", "ContactController:index", "contact.index");
$route->get("/contact/{contact}", "contactController:show", "contact.show");
$route->post("/contact", "ContactController:store", "contact.store");
$route->put("/contact/{contact}", "ContactController:update", "contact.update");
$route->delete("/contact/{contact}", "ContactController:delete", "contact.delete");

$route->dispatch();

if ($route->error()) {
    echo "<h1>{$route->error()}</h1>";
}
