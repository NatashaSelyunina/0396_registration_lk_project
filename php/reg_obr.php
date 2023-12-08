<?php
header('Content-Type: text/html; charset=utf-8');

$host = "localhost";
$db = "ubgcbugo_0396";
$user = "ubgcbugo_0396";
$password = "1401Mihail";

$mysqli = mysqli_connect("$host", "$user", "$password", "$db");

$name = $_POST["name"];
$lastname = $_POST["lastname"];
$email = trim(mb_strtolower($_POST["email"]));
$pass = trim($_POST["pass"]);
$pass = password_hash($pass, PASSWORD_DEFAULT);

$result = $mysqli->query("SELECT * FROM `users2` WHERE `email`='$email'");

if ($result->num_rows != 0) {
  print("exist");
} else {
  $mysqli->query("INSERT INTO `users2`(`name`, `lastname`, `email`, `pass`) VALUES ('$name', '$lastname', '$email', '$pass')");
  print("ok");
}



// $sql = "SELECT * FROM `users` WHERE `email`=?";
// $stmt = $mysqli->prepare($sql);
// $stmt->bind_param("s", $email);
// $stmt->execute();
// $result = $stmt->get_result();

// if ($result->num_rows != 0) {
//   print("exist");
// } else {
//   $sql = "INSERT INTO `users`(`name`, `lastname`, `email`, `pass`) VALUES (?,?,?,?)";
//   $stmt = $mysqli->prepare($sql);
//   $stmt->bind_param("ssss", $name, $lastname, $email, $pass);
//   $stmt->execute();
//   print("ok");
// }

//ubgcbugo_0396