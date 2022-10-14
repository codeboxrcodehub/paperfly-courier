<?php

namespace Codeboxr\PaperflyCourier\Exceptions;

use Throwable;
use Exception;

class PaperflyValidationException extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        if (is_array($message)) {
            $requiredColumnsImplode = implode(",", $message);
            parent::__construct("$requiredColumnsImplode filed is required", $code, $previous);
        } else {
            parent::__construct($message, $code, $previous);
        }
    }
}
