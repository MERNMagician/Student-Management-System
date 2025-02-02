<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_users";

$user = $_POST["username"];
$pass = $_POST["password"];

//Handling Errors
error_reporting(E_ALL);
ini_set('display_errors',1);

//creating connection
$connection = mysqli_connect($servername,$username,$password,$dbname);

//check connection
if(!$connection){
    die("Connection Error" . mysqli_connect_error());

}


$query = "SELECT * FROM `users` WHERE username = ? AND pass = ?";
$query = $connection -> prepare($query);
$query -> bind_param("ss",$user,$pass);
$query -> execute();
$result = $query->get_result();




if($result->num_rows > 0){
    echo "<h1> Found </h1>"; 

}else{
    echo "<h1> Not Found </h1>"; 
    
}