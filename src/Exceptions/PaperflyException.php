<?php


namespace Codeboxr\PaperflyCourier\Exceptions;

use Exception;
use Throwable;

class PaperflyException extends Exception
{
    private $errors;

    public function __construct($message = "", $code = 0, $errors = [], Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->errors = $errors;
    }

    public function render()
    {
        return [
            'error'   => true,
            'code'    => $this->code,
            'message' => $this->getMessage(),
//            'errors'  => $this->errors
        ];
    }
}
