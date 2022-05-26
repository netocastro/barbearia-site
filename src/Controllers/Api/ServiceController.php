<?php

namespace Source\Controllers\Api;

use Source\Models\Service;

class ServiceController
{
    public function index()
    {
        echo json_encode(objectToArray((new Service())->find()->fetch(true)));
    }

    public function show($data)
    {
        echo json_encode(objectToArray((new Service())->findById($data['service'])));
    }

    public function store($data)
    {
      
        
    }
}
