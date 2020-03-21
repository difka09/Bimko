<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Illuminate\Support\Facades\Auth;



class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];



    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ModelNotFoundException) {
            if($request->segment(1) == 'feed' || $request->ajax()){
                return redirect()->action('User\FeedController@exceptionFeed');
            }
        }
        if ($exception instanceof MethodNotAllowedHttpException){
            if($request->segment(1) == 'logout' || $request->ajax()){
                return redirect()->action('User\FeedController@indexFeed');
            }
            abort(404);
        }
        // if (auth()->check()) {
        //     if(auth()->user()->hasRole('admin')) {
        //         if($request->segment(1) == 'admin' || $request->ajax()){
        //             return redirect()->route('admin.index');
        //         }
        //     }
        //     if(auth()->user()->hasRole('Guru')) {
        //         if($request->segment(1) == 'a' || $request->ajax()){
        //             return redirect()->route('guru.index');
        //         }
        //     }
        // }else
        // {
        //     return redirect('/login');

        // }

       return parent::render($request, $exception);

    }
}
