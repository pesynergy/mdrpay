<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    public function report(Throwable $e)
    {
        // Your reporting logic here
    }
    public function render($request, Throwable $exception)
    {
        return response()->json([
             'error' => $exception->getMessage(),
        'file' => $exception->getFile(),
        'line' => $exception->getLine(),
         'trace' => $exception->getTrace(),
        ], 500);
    }

}
