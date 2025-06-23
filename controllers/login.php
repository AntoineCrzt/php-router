<?php

// pour simplifier, le simple fait de cliquer sur le lien de connexion nous connecte
function login()
{
    $_SESSION['auth'] = true;
    return header('location: index.php');
}