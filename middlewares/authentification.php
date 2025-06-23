<?php
function checkAuth()
{
    $logged_in = $_SESSION['auth'] ?? false;
    if (!$logged_in) {
        return header('location: index.php?action=403');
    }
}
