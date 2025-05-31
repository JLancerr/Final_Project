<?php
    session_start();
    $_SESSION = [];
    session_destroy();
    header('Location: ../templates/landing.html');
    exit();
?>