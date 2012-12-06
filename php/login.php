<!DOCTYPE HTML>

<html>
<head>
<link href="../css/main.css" rel="stylesheet" type="text/css" />
</head>

<body style="background-color:#000000;">
<div class="wrapper">
<div class="header">
<h1>
<img src="../images/banner.png">
<br/>
OU's Unofficial Digital Notice Board
</h1>
<div class="navbar">
<a href="http://www.secs.oakland.edu/~djanders/index.html">Home</a> <a href="http://www.secs.oakland.edu/~djanders/php/categories.php">Categories</a> <a href="http://www.secs.oakland.edu/~djanders/html/about.html">AboutUs</a> <a href="http://www.secs.oakland.edu/~djanders/html/submit.html">SubmitPost</a> <a href="http://www.secs.oakland.edu/~djanders/php/wall.php">TheWall</a>
</div>
</div>
<div class="content_wrapper">
<div class="main">

<p>
<?php
session_start();
include("passwords.php");
if ($_POST["ac"]=="log") { /// do after login form is submitted 
     if ($USERS[$_POST["username"]]==$_POST["password"]) { /// check if submitted
     //username and password exist in $USERS array 
          $_SESSION["logged"]=$_POST["username"];
     } else {
          echo 'Incorrect username/password. Please, try again.';
     };
};
if (array_key_exists($_SESSION["logged"],$USERS)) { //// check if user is logged or not 
     echo "You are logged in."; //// if user is logged show a message 
	 header("Location: admin.php");
} else { //// if not logged show login form
     echo '<form action="login.php" method="post"><input type="hidden" name="ac" value="log"> ';
     echo 'Username: <input type="text" name="username" />';
     echo 'Password: <input type="password" name="password" />';
     echo '<input type="submit" value="Login" />';
     echo '</form>';
};
?>
</div>
</div>
</div>
</body>
</html>
<body>
