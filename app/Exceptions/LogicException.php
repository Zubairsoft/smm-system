<?php

namespace App\Exceptions;

use Exception;

class LogicException extends Exception
{
    private $errorKey;

    public function __construct($message = 'error', $statusCode = 400, string $errorKey = null)
    {
        parent::__construct($message, $statusCode);

        $this->errorKey = $errorKey;
    }

    public function getErrorKey()
    {
        return $this->errorKey;
    }
}
