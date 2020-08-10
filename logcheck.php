<?php

if(isset($_POST['submit'])){
    $conn = mysqli_connect('localhost', 'root', '', 'webtechLab');

        if(empty($_POST['userId']) || empty($_POST['pass'])){
            echo "Invalid";
        }
        else{
            $userId = $_POST['userId'];
            $password = $_POST['pass'];
            $query = "SELECT * FROM userinfo WHERE userId = '$userId' AND Pass = '$password'";
            $result = mysqli_query($conn, $query);

            while( $row = mysqli_fetch_assoc($result) ){
                
                $Cname     = $row['name'];
                 $CuserId    = $row['userId'];
                $Cemail    = $row['email'];
                $Cpassword = $row['password'];
                $CuserType = $row['userType'];

                if(($uname == $Cusername) && ($password == $Cpassword)){
                    if($CuserType == 'Admin'){

                    	$user = ['name'=> $Cname,'userId'=> $Cusername,'userType'=> $CuserType,'pass'=> $Cpassword];

			
			            $_SESSION['name']   = $uname;
			            $_SESSION['userName']   = $uname;
			            $_SESSION['userType'] 	= $CuserType;
			            $_SESSION['pass'] 	    = $password;
			            $_SESSION['user'] 		= $user;

			
			            setcookie('name', $name, time()+3600, '/');
			            setcookie('userName', $uname, time()+3600, '/');
			            setcookie('email', $email, time()+3600, '/');
			            setcookie('pass', $password, time()+3600, '/');
			            

                        header('location: AdminPage.php');
                    }
                    else if($CuserType == 'User'){
                        header('location: UserPage.php');
                    }
                }
            } 
        }
    }  
else
{
    echo "sorry!!";
}