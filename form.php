<?php
$user_login = trim($_POST["login"]);
$user_password = trim($_POST["password"]);
$user_email = trim($_POST["email"]);


$connection = new PDO('mysql:host=localhost;dbname=drum`code','root', '');
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = 'SELECT * FROM users WHERE login = :login AND password = :password AND email = :email';
$statement = $connection->prepare($query);
$statement->execute(
    [
        "login" => $_POST["login"],
        "password" => $_POST["password"],
        "email" => $_POST["email"]
    ]
);
$count = $statement->rowCount();
if ($count>0){
    header("location: login.html");
}
else{
    echo 'некорректно введенные данные.
    попробуйте еще раз';
    header('refresh: 1.2; url=/drum`code/registration/index.html');
}









