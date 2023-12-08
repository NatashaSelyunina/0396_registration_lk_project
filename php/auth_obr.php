<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

$host = "localhost";
$db = "ubgcbugo_0396";
$user = "ubgcbugo_0396";
$password = "1401Mihail";

$mysqli = mysqli_connect("$host", "$user", "$password", "$db");

$email = trim(mb_strtolower($_POST["email"]));
$pass = trim($_POST["pass"]);

$result = $mysqli->query("SELECT * FROM `users2` WHERE `email`='$email'");
$result = $result->fetch_assoc();

if (password_verify($pass, $result["pass"])) {
  echo "ok";
  $_SESSION["id"] = $result["id"];
  $_SESSION["email"] = $result["email"];
  $_SESSION["name"] = $result["name"];
  $_SESSION["lastname"] = $result["lastname"];
} else {
  echo "not_found";
}