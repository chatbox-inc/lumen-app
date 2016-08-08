<?php

namespace Chatbox\LumenApp\Exceptions;

use Chatbox\LumenApp\Http\Response\APIResponse;
use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        /** @var APIResponse $response */
        $response = app(APIResponse::class);
        $body = [];
        if($e instanceof ValidationException){
            $body["message"] = "validation error";
            $body["error"] = $e->validator->messages();
            return $response->bad($body);
        }



        return parent::render($request, $e);
    }

    protected function parseException(){
        /** @var APIResponse $response */
        $response = app(APIResponse::class);

        $fe = FlattenException::create($e);

        $data = env("APP_DEBUG",false)?$fe->toArray():[
            "message" => "whoops, something wrong."
        ];
        return JsonResponse::create($data,500);
    }
}
