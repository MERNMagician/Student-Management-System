<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_users";

$email = $_POST["email"];
$user = $_POST["user"];
$pass = $_POST["password"];



//error handling - prints errors
error_reporting(E_ALL);
ini_set('display_errors <br>',1);

//create connection
$connect = mysqli_connect($servername,$username,$password,$dbname);

//check connection
if(!$connect){
    die("Connection error" . mysqli_connect_error());

}

$query = "INSERT INTO `users` (email, username, pass) VALUES (?, ?, ?)";
echo $query;
$statement = $connect -> prepare($query);


$statement -> bind_param("sss",$email,$user,$pass);

if($statement -> execute()){
    echo '<h1>'. 'Record Added' . '</h1>';

}else{
    echo '<h1>'."Failure".'</h1>';
}