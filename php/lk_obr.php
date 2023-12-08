<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

$host = "localhost";
$db = "ubgcbugo_0396";
$user = "ubgcbugo_0396";
$password = "1401Mihail";

$mysqli = mysqli_connect("$host", "$user", "$password", "$db");

$inputValue = $_POST["value"];
$item = $_POST["item"];
$id = $_SESSION["id"];
//$email = $_SESSION["email"];

$mysqli->query("UPDATE `users2` SET `$item`='$nputValue' WHERE `id`='$id'");
$_SESSION[$item] = $inputValue;