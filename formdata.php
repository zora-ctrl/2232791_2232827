<?php
include 'navbar.php';
$name = $_POST['name']; 
$mail = $_POST['email'];
$sub = $_POST['subject'];
$msg = $_POST['subject'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname ="bootstrap";


$conn = mysqli_connect($servername,$username,$password,$dbname);
$sql = "INSERT INTO contact_us(name,mail,sub,msg)
VALUES('$name','$mail','$sub','$msg')";
mysqli_query($conn,$sql);
echo "Your Message Sent Successfully";

?>