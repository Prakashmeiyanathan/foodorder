<?php
include("config.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
	$username=mysqli_real_escape_string($connection,$_POST['username']);
	$password=mysqli_real_escape_string($connection,$_POST['password']);
	$result = mysqli_query($connection,"SELECT * FROM member");
	$c_rows = mysqli_num_rows($result);
	if ($c_rows!=$username) {
		header("location: login	.php?remark_login=failed");
	}
	$sql="SELECT mem_id FROM member WHERE username='$username' and password='$password'";
	$result=mysqli_query($connection,$sql);
	$row=mysqli_fetch_array($result);
	$active=$row['active'];
	$count=mysqli_num_rows($result);
	if($count==1) {
		$_SESSION['login_user']=$username;
		header("location: home.php");
	}
}
?>