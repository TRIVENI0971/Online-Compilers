<?php 
echo "hello";
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['email']) && isset($_POST['password']))
{

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}
	if (empty($email)) {
		header("Location: index.php?error=email is required");
		exit();
	}
	else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        $pass = md5($pass);

        
		$sql = "SELECT * FROM users WHERE user_name='$uname'  AND email='$email' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['email'] === $email && $row['password'] === $pass) {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
            	header("Location:home.php");
		        exit();
            }else{
				header("Location: index.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect User name or password");
	        exit();
		}
}	
}else{
	header("Location: index.php");
	exit();
}