<?php

namespace amp;

class ErrorInterceptor
{

    public function __construct()
    {
        /* установим режим отображения ошибок в зависимости от среды исполнения приложения */
        if (DEBUG) {
            error_reporting(E_ALL);
        } else {
            error_reporting(NIL);
        }

        // подключаем функции-перехватчики событий
        set_exception_handler([$this, 'exceptionHandler']);
        set_error_handler([$this, 'errorHandler']);

        // критичные ошибки отдельно
        ob_start();
        register_shutdown_function([$this, 'fatalErrorHandler']);

    }


    public function errorHandler($errno, $errstr, $errfile, $errline)
    {

    }

    public function exceptionHandler(\Throwable $e)
    {

    }

    public function fatalErrorHandler()
    {
        $error = error_get_last();

        if (!empty($error && $error['TYPE'] & (E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR) )) {

            // log error
            ob_end_clean();

            // display error
        } else {
            ob_end_flush();
        }

    }



}