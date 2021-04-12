<?php
$connection = mysqli_connect("localhost","root","","user");
$username = $_POST['user'];
$password = $_POST['pass'];
$hashFormat="$2y$10$";
$salt = "iusesomecrazystrings19";
$hashF_and_salt= $hashFormat.$salt;
$password = crypt($password,$hashF_and_salt);
$query = "SELECT * FROM user_tbl where username='$username'";
$row=mysqli_query($connection,$query);
$result = mysqli_fetch_array($row);
if($result['password']==$password){
    echo "welcome";
}
else {
    echo "you're not allowed";
}
?>