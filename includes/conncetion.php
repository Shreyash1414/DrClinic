<?php
$servername = "localhost";
$username = "root";
$password = "";
$database="drclinic";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{
 
}
?>