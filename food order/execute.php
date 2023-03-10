<?php 
session_start();
include('config.php');
$username=$_POST['username'];
$result = mysqli_query($connection,"SELECT * FROM member WHERE username='$username'");
$num_rows = mysqli_num_rows($result);
if ($num_rows) {
 header("location: login.php?remarks=failed"); 
}else {
 $fname=$_POST['fname'];
 $lname=$_POST['lname'];
 $address=$_POST['address'];
 $number=$_POST['number'];
 $details=$_POST['details'];
 $password=$_POST['password'];
 if(mysqli_query($connection,"INSERT INTO member(fname, lname, address,number,details ,username, password)
 VALUES('$fname', '$lname','$address','$number','$details', '$username', '$password')")){ 
	header("location: login.php?remarks=success");
 }else{
	 $e=mysqli_error($connection);
	header("location: login.php?remarks=error&value=$e");	 
 }
}
?>