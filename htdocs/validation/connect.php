<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try {
        $conn = new mysqli('localhost', 'root', '', 'topup_db');
    } catch (Exception $e) {
        header('Location: ../templates/error.php?error=database_connection_failed');
        exit();
    }
?>