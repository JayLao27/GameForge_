<?php
session_start();
session_destroy();
header("Location: ../../src/Main_Pages/signIn.php");
exit();
?>
