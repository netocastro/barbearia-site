<?php

namespace Source\Models;

use Stonks\DataLayer\DataLayer;

class Contact extends DataLayer
{
      function __construct()
      {
            parent::__construct('contacts', ['name', 'email', 'text_email'], 'id', true);
      }
}
