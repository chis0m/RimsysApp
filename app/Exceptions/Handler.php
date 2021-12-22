<?php

namespace App\Exceptions;

use acidjazz\metapi\MetApi;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Lang;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (Exception $e) {
            $statusCode = $e->getCode() ?: 500;
            $message = $e->getMessage();
            $trace = [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'code' => $statusCode,
                'time' => \Carbon\Carbon::now()->toDayDateTimeString(),
            ];
            $error = [
                "detail" => ($message) ?: 'Server Error',
                "trace" => $trace,
            ];

            $response = ['success' => false, 'errors' => [$error]];
            return response()->json($response, $statusCode);
        });
    }
}
