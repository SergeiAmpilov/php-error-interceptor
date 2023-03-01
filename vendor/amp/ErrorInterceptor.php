<?php

namespace amp;

class ErrorInterceptor
{

    public function __construct()
    {

        /* установим режим отображения ошибок в зависимости от среды исполнения приложения */
        if (DEBUG) {
            error_reporting(E_ALL);
//            ini_set('display_errors', true);
        } else {
            error_reporting(0);
//            ini_set('display_errors', false);
        }

        // подключаем функции-перехватчики событий
        set_exception_handler([$this, 'exceptionHandler']);
        set_error_handler([$this, 'errorHandler']); /* интересно что логирование ошибок при подключении хэндлера отключилось*/

        // критичные ошибки отдельно
        ob_start();
        register_shutdown_function([$this, 'fatalErrorHandler']);

    }


    public function errorHandler($errno, $errstr, $errfile, $errline)
    {
        $this->displayError(1,233,3,4,5);

    }

    public function exceptionHandler(\Throwable $e)
    {
        $this->displayError(1,222,3,4,5);

        echo '==exception=='; die;
        echo "<pre>" . print_r($e,1) . "</pre>";
        die;
    }

    public function fatalErrorHandler()
    {
        $error = error_get_last();

        if (!empty($error && $error['TYPE'] & (E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR) )) {

            $this->displayError(1,200,3,4,5);

            echo "<pre>--fatal---" . print_r($error,1) . "</pre>";
            // log error
            ob_end_clean();

            // display error
        } else {
            ob_end_flush();
        }
        die;
    }

    protected function displayError($errno, $errstr, $errfile, $errline, $responseCode = 500)
    {
        require_once WWW . '/display_error.php';
        die;

    }



}