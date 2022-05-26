<?php

namespace Source\Models;

use Stonks\DataLayer\DataLayer;

class Event extends DataLayer
{
    public function __construct()
    {
        parent::__construct('events', ['user_id', 'status_id', 'start', 'end', 'color', 'textColor', 'title'], 'id', true);
    }
}
