<?php

namespace Source\Controllers\Api;

use Source\Models\Contact;

class ContactController
{
    public function index()
    {
        echo json_encode(objectToArray((new Contact())->find()->fetch(true)));
    }

    public function show($data)
    {
        echo json_encode(objectToArray((new Contact())->findById($data['contact'])));
    }

    public function store($data)
    {
        $emptyFields = array_keys($data, '');

        if ($emptyFields) {
            echo json_encode(['emptyFields' => $emptyFields]);
            return;
        }

        $data = filter_var_array($data, [
            "name" => FILTER_SANITIZE_STRIPPED,
            "email" => FILTER_VALIDATE_EMAIL,
            "text_email" => FILTER_SANITIZE_STRING
        ]);

        $validateFields = [];

        if (!validateEmail($data['email'])) {
            $validateFields['email'] = 'Formato de email inválido';
        }

        if ($validateFields) {
            echo json_encode(['validateFields' => $validateFields]);
            return;
        }

        $contact = new Contact();

        $contact->name = ucfirst($data['name']);
        $contact->email = $data['email'];
        $contact->text_email = $data['text_email'];
        $contact->save();

        if ($contact->fail()) {
            echo json_encode("contact: " . $contact->fail());
            return;
        }

        echo json_encode(['success' => 'Enviado com sucesso']);
    }

    public function delete($data)
    {
        $contact = (new Contact())->findById($data['id']);

        if ($contact) {
            if ($contact->destroy()) {
                echo json_encode(['deletedContact' => 'Contato deletado com sucesso']);
                return;
            }else{
                echo json_encode($contact->fail()->getMessage());
                return;
            }
        }else{
            echo json_encode(['contactError' => 'Cliente nao cadastrado']);
            return;
        }
        
    }
}
