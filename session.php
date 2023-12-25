
<?php
session_start();
if($_SESSION["adminid"]) {
?>
<?php
}else  header("Location:auth-login.php");
include ('db.php');

?>
