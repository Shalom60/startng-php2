<?Php session_start(); require_once("functions/alert.php");


set_alert("error", "failed to complete payment");
header('Location: paybill.php');