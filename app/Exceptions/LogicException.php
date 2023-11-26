<?php

namespace App\Exceptions;

use Exception;

class LogicException extends Exception
{

    public function __construct($message = 'error', $statusCode = 400)
    {
        parent::__construct($message, $statusCode);
    }
}
