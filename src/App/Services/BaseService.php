<?php

namespace App\Services;

class BaseService
{
    protected $db;
    protected $log;

    public function __construct($db, $log)
    {
        $this->db = $db;
        $this->log = $log;
    }

}
