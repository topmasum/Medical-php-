<?php
$servername="localhost";
$username="root";
$password="";
$database="webprac";
$conn=mysqli_connect($servername,$username,$password,$database);
if (!$conn)
{
	echo "Connection failed";
}