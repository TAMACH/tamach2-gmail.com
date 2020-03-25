<?php
$login = "root";
$password = "";
$host = "localhost";
$dbname = "gouv";
$db = new PDO("mysql:dbname=$dbname;host=$host", $login, $password ); 
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$db->query("SET NAMES utf8");


$email = $_POST["email"];
$name = $_POST["name"];
$lastname = $_POST["lastname"];
$password = $_POST["password"];

$stmt = $pdo->prepare("INSERT INTO users VALUES(':email',':name',':lastname',':password')");
$res = $stmt->execute([':email' => $email,':name' => $name,':lastname' => $lastname,':password' => $password]);
if (!$res || $res->rowCount()==0) {
    echo "error";
    exit();

}else{
    echo "user with email $email has been created";
}
?>