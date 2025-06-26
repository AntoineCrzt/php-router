<?php

namespace Controllers;

class ErrorsController
{
    public function error404()
    {
        echo '404';
    }
    
    public function error403()
    {
        echo '403';
    }

    public function error400()
    {
        echo '400';
    }
}
