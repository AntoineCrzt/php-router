<?php
session_start();

// pour simplifier, le simple fait de cliquer sur le lien de connexion nous connecte

$_SESSION['auth'] = true;

return header('location: index.php');
