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
    }

}