<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
        // Specify the exceptions you want to exclude from reporting
    ];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register()
    {
        $this->reportable(function (Throwable $e) {
            // Log specific exceptions or notify admins
        });
    }

    public function render($request, Throwable $exception)
    {
        // Check if the request is for specific API or routes
        // if ($request->is('api/*') || $request->is('staff/*') || $request->is('customer/*') || $request->is('dealer/*') || $request->is('servicepartner/*') || $request->is('auction-inquiry-generation/*')) {
            return $this->handleApiException($exception);
        // }

        // Call parent render for other requests
        return parent::render($request, $exception);
    }

    private function handleApiException(Throwable $exception)
    {
        if ($exception instanceof ModelNotFoundException) {
            return $this->jsonResponse('Resource item not found.', 404);
        }

        if ($exception instanceof NotFoundHttpException) {
            return $this->jsonResponse('Resource not found.', 404);
        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            return $this->jsonResponse('Method not allowed.', 405);
        }

        // Handle other exceptions here, if necessary

        // For all other exceptions, return a generic message
        return $this->jsonResponse('An error occurred.', 500);
    }

    private function jsonResponse(string $message, int $status)
    {
        return response()->json([
            'status' => false,
            'message' => $message,
        ], $status);
    }
}
