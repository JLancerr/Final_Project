<?php
    session_start();
    $_SESSION = [];
    session_destroy();
    header('Location: ../Landing/Landing.php');
    exit();
?>