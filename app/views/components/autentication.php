<?php
    if (empty($_SESSION['email']) && (empty($_SESSION['password']))) {
        header('Location: /login');
    }
?>