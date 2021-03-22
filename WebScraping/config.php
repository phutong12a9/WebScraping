<?php
require "conn.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$d = $_POST["domain"];
	$t = $_POST["tag_title"];
	$c = $_POST["tag_content"];
	$p = $_POST["tag_price"];
	$a = $_POST["tag_address"];
	$s = $_POST["tag_square"];
	$ct = $_POST["tag_contact"];
	$img = $_POST["tag_img"];
}
$sql = "INSERT INTO config VALUES(null,'$d','$t','$c','$p','$a','$s','$ct','$img')"; 
mysqli_query($conn,$sql);
// Go to back
if (isset($_SERVER["HTTP_REFERER"])) {
	header("Location: " . $_SERVER["HTTP_REFERER"]);
}
?>