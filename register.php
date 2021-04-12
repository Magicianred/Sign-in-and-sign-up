<?php
$connection = mysqli_connect('localhost','root','','user');
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$username = mysqli_real_escape_string($connection,$username);
$email = mysqli_real_escape_string($connection,$email);
$password = mysqli_real_escape_string($connection,$password);
$hashFormat = "$2y$10$";
$salt = "iusesomecrazystrings19";
$hashF_and_salt = $hashFormat.$salt;
$password = crypt($password,$hashF_and_salt);
$query = "INSERT INTO user_tbl (username,password,email) VALUES ('$username','$password','$email')";
$result = mysqli_query($connection,$query);
if (!$result){
    die('Query FAILD'.mysqli_error());
}
else{
    header("location:index.php");
}
