<?php 
$host = "localhost";
$username = "root";
$password = "";
$dbName = "db_scraping";
// Create Connect
$conn = mysqli_connect($host,$username,$password,$dbName);
  
// Check Connect
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

?>