<?php
$name=$_POST['name'];
$number=$_POST['number'];
$email=$_POST['email'];
$date=$_POST['date'];

$conn= new mysqli('localhost','root','','hospital');
if($conn->connect_error){
    die('Connection failed : ' .$conn->connect_error);
}else{
    $stmt=$conn->prepare("insert into hospita_manage(Name,Phone number,Email,Date)
    values(?,?,?,?)");
    $stmt->bind_param("siss",$name,$number,$email,$date);
    $stmt->execute();
    echo "Registration successful...";
    $stmt->close();
    $conn->close();
}


?>