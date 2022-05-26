<?php

namespace Source\Models;

use Stonks\DataLayer\DataLayer;

class Service extends DataLayer
{
    public function __construct()
    {
        parent::__construct('services', ['name'], 'id', true);
    }
}
