<?php

namespace Ryft\Exceptions;

use Exception;

final class RyftException extends \Exception
{
    public $requestId;
    public $statusCode;
    public $status;
    public $errors;

    public function __construct(
        string $requestId,
        int $statusCode,
        string $status,
        array $errors,
        string $message = "",
        int $code = 0,
        \Throwable $previous = null,
    ) {
        parent::__construct($message, $code, $previous);
        $this->requestId = $requestId;
        $this->statusCode = $statusCode;
        $this->errors = $errors;
        $this->status = $status;
    }
}
