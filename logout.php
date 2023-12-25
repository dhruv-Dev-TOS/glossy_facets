<?php
session_start();

unset($_SESSION["adminid"]);
header("Location:auth-login.php");
?>