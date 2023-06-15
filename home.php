<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
     <style>
          h1{
               color:black;
          }
          a{
               color:#fff;
               text-decoration: none;
               background: #fff;
               color: #40754C;
               padding: 10px;
               width: 10%;
               border-radius: 5px;
               margin: 20px auto;
               text-align:center;
          }
     </style>
</head>
<body>
     <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
     <a href="n.html">click</a>
     <a href="logout.php">Logout</a>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>