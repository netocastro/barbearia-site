<?php

namespace Source\Controllers\Api;

use Source\Models\User;

class UserController
{
    public function index()
    {
        echo json_encode(objectToArray((new User())->find()->fetch(true)));
    }

    public function show($data)
    {
        echo json_encode(objectToArray((new User())->findById($data['service'])));
    }

    public function store($data)
    {
        $findEmptyFields = array_keys($data, '');

        if ($findEmptyFields) {
            echo json_encode(['emptyFields' => $findEmptyFields]);
            return;
        }

        $data = filter_var_array($data, [
            "name" => FILTER_SANITIZE_STRIPPED,
            "cpf" => FILTER_SANITIZE_STRIPPED,
            "email" => FILTER_VALIDATE_EMAIL,
            "nick" => FILTER_SANITIZE_STRIPPED,
            "phone" => FILTER_SANITIZE_STRIPPED,
            "password" => FILTER_SANITIZE_STRIPPED,
            "repeat_password" => FILTER_SANITIZE_STRIPPED
        ]);

        $validateFields = [];

        if (!validateEmail($data['email'])) {
            $validateFields['email'] = 'Formato de email inválido';
        }

        if ((new User())->find('email = :e', "e={$data['email']}")->fetch()) {
            $validateFields['email'] = 'Email já foi cadastrado';
        }

        if (!validateCpf($data['cpf'])) {
            $validateFields['cpf'] = 'Formato de CPF inválido';
        }

        if ((new User())->find('cpf = :c', "c={$data['cpf']}")->fetch()) {
            $validateFields['cpf'] = 'CPF já foi cadastrado';
        }

        if ((new User())->find('nick = :n', "n={$data['nick']}")->fetch()) {
            $validateFields['nick'] = 'Nick já foi cadastrado';
        }

        if ((new User())->find('name = :n', "n={$data['name']}")->fetch()) {
            $validateFields['name'] = 'Nome já foi cadastrado';
        }

        if (!validateName($data['name'])) {
            $validateFields['name'] = 'Formato do nome inválido';
        }

        if ($data['password'] != $data['repeat_password']) {
            $validateFields['repeat_password'] = "Senhas não conferem";
        }

        if ($validateFields) {
            echo json_encode(['validateFields' => $validateFields]);
            return;
        }

        $user  = new User();

        $user->name  = $data['name'];
        $user->email = $data['email'];
        $user->nick = $data['nick'];
        $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
        $user->cpf = $data['cpf'];

        $user->save();

        if ($user->fail()) {
            echo json_encode($user->fail());
        } else {
            echo json_encode(['success' => 'Registrado com sucesso']);
        }
    }

    public function delete($data)
    {
        $user = (new User())->findById($data['id']);

        if ($user) {
            if ($user->destroy()) {
                echo json_encode(['deletedUser' => 'Cliente deletado com sucesso']);
                return;
            }else{
                echo json_encode($user->fail()->getMessage());
                return;
            }
        }else{
            echo json_encode(['userError' => 'Cliente nao cadastrado']);
            return;
        }
    }
}
