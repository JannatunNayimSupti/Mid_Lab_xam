<?php
    if(isset($_POST['submit'])){
    	$conn = mysqli_connect('localhost', 'root', '', 'webtechLab');

        $name     = $_POST['name'];
	   
         $userId = $_POST['userId'];
         $userType = $_POST['userType'];
	    $email    = $_POST['email'];
       
	    $password = $_POST['pass'];
       
        $query = "INSERT INTO userinfo (name, userId,userType, email, password) VALUES ('$name',$userType, '$userId','$email', '$password')";
        $result = mysqli_query($conn, $query);

        header('location: login.php');
    }
    else
    {
    	echo "sorry!!";
    }
?>