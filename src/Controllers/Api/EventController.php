<?php

namespace Source\Controllers\Api;

use DateTime;
use League\Plates\Engine;
use Source\Models\Event;
use Source\Models\Service;
use Source\Models\User;
use Stonks\Router\Router;

class EventController
{

    public function index()
    {
        echo json_encode(objectToArray((new Event())->find()->fetch(true)));
    }

    public function show($data)
    {
        echo json_encode(objectToArray((new Event())->findById($data['event'])));
    }

    public function store($data)
    {
        /**
         * quando for salvar uma data que seja muito a frente , posso fazer o teste, baseado no que o barbeiro
         * pretende atender, exemplo: se o barbeiro quer permitir agendamento apenas ate 2 semanas na frente 
         * pq ele ira viajar eu faco um teste se a data que o usuario quer marcar é menor que o dia atual
         * mais os 14 dias.
         * 
         */

        /**
         * tambem bloquear agendamentos que sejam para antes do dia atual.
         * OBS: procurar alguma funcionalidade no fullcalendar para deixar as datas anteriores ao dia atual
         * não possam ser clicadas.
         */
        if (empty($_SESSION['user_id'])) {
            echo json_encode(['whithoutLogin' => 'Você precisa estar logado para realizar um agendamento. ']);
            return;
        }

        $date = new DateTime($data['data']);

        $user = (new User())->findById($_SESSION['user_id']);

        if (!$user) {
            echo json_encode(['error' => 'usuario não registrado']);
            return;
        }

        $event = new Event();

        $event->user_id = $user->id;
        $event->status_id = '1';
        $event->service_id = $data['service'];
        $event->start = $date->format(DateTime::ISO8601);
        $event->end = $date->add(date_interval_create_from_date_string('30 minutes'))->format(DateTime::ISO8601);
        $event->color = 'blue';
        $event->textColor = 'white';
        $event->title = $user->nick . ' ' . (new Service())->findById($data['service'])->name;

        $event->save();

        if ($event->fail()) {
            echo json_encode($event->fail()->getMessage());
            return;
        }

        echo json_encode(['success' => 'agendado com sucesso']);

        /*
            `id` INTEGER AUTO_INCREMENT,
            `color` varchar(20),
            `textColor` varchar(20),
            `title` varchar(20),

        */
    }
}
