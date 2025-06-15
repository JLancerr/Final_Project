<?php
    session_start();
    $_SESSION = [];
    session_destroy();
    header('Location: ../Frontend/Landing/Landing.html');
    exit();
?>