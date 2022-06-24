<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "pb";

$con = mysqli_connect($server, $user, $pass, $database);

if (!$con) {
    die("<script>alert('Connection Failed.')</script>");
}


function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows [] = $row;
    }
    return $rows;
 
}


?>
