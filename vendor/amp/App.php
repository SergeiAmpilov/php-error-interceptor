<?php

namespace amp;

class App
{

    public function __construct()
    {
        new ErrorInterceptor();
    }

}