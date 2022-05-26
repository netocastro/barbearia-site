<?php

namespace Source\Controllers\Admin;

use Source\Models\Contact;

class AdminControllerRequest
{
    public function readContact($data)
    {
        $contact = (new Contact())->findById($data['id']);
        $contact->status = '1';
        $contact->change()->save();

        if ($contact->fail()) {
            echo json_encode($contact->fail()->getMessage());
            return;
        }
        echo json_encode($contact->id);
    }
}
