<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../../src/Main_Pages/signIn.php");
    exit();
}
?>