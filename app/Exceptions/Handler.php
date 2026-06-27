<?php

namespace App\Exceptions;

use App\Models\ErrorReport;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
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
        $this->reportable(function (Throwable $e) {
            $contains = Str::contains($e->getFile(), 'Helpers.php');
            if(!$contains){
                $data = [
                    'message'=>$e->getMessage(),
                    'line'=>$e->getLine(),
                    'file'=>$e->getFile(),
                    'url'=> URL::full(),
                    'project'=> 'w3coderschool',
                ];
                ErrorReport::create($data);
            }
        });
    }
}

