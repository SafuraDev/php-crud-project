<?php
$host = "sql103.infinityfree.com";     
$user = "if0_39015674";        
$password = "QQWCk9xlZOck"; 
$db = "if0_39015674_LySafura"; 

$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
