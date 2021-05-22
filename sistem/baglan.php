<?php 
session_start();
ob_start();

try {
	$db= new PDO("mysql:host=localhost; dbname=blogsitem; charset=utf8;","root","1234567");
} catch (PDOExpection $error) {
	echo "<center><b>Veritabanına Bağlanılamadı!</b></center>"; $error->getMessage();
}

 ?>