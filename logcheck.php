<?php

if(isset($_POST['submit'])){
    $conn = mysqli_connect('localhost', 'root', '', 'webtechLab');

        if(empty($_POST['userId']) || empty($_POST['pass'])|| empty($_POST['userType'])){
            echo "Invalid";
        }
        else{
            $userId = $_POST['userId'];
             $userType = $_POST['userType'];
            $password = $_POST['pass'];
            $query = "SELECT * FROM userinfo WHERE userId = '$userId', userType = '$userType' AND pass = '$password'";
            $result = mysqli_query($conn, $query);

            while( $row = mysqli_fetch_assoc($result) ){
                
                $Cname     = $row['name'];
                 $CuserId    = $row['userId'];
                $Cemail    = $row['email'];
                $Cpassword = $row['password'];
                $CuserType = $row['userType'];

                if(($userId == $userId) && ($password == $password)){
                    if($CuserType == 'Admin'){

                    	$user = ['name'=> $name,'userId'=> $userId,'userType'=> $userType,'pass'=> $Cpassword];

			
			            $_SESSION['name']   = $name;
			            $_SESSION['userId']    = $userId;
                         $_SESSION['email']    = $email;
			            $_SESSION['userType'] 	= $userType;
			            $_SESSION['pass'] 	    = $password;
			            $_SESSION['user'] 		= $user;

			
			            setcookie('name', $name, time()+3600, '/');
                        setcookie('userType', $userType, time()+3600, '/');
			            setcookie('userId', $userId, time()+3600, '/');
			            setcookie('email', $email, time()+3600, '/');
			            setcookie('pass', $password, time()+3600, '/');
                        
			            

                        header('location: AdminPage.php');
                    }

                    else ($CuserType == 'User'){
                        header('location: UserPage.php');
                    }
                }
            }

?>