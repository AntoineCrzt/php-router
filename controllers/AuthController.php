<?php

namespace Controllers;

class AuthController
{
    public function login()
    {
        $_SESSION['auth'] = true;

        return header('location: index.php');
    }
}
