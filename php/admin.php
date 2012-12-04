<?php
session_start(); /// initialize session
include("passwords.php");
check_logged(); /// function checks if visitor is logged.
//If user is not logged the user is redirected to login.php page 
?> 
<!DOCTYPE HTML>

<html>
<head>

<link href="../css/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="wrapper">
<div class="header">
<h1>
<img src="../images/banner.png">
<br/>
OU's Unofficial Digital Notice Board
</h1>
<div class="navbar">
<a href="http://www.secs.oakland.edu/~djanders/index.html">Home</a> <a href="http://www.secs.oakland.edu/~djanders/html/categories.html">Categories</a> <a href="http://www.secs.oakland.edu/~djanders/html/about.html">AboutUs</a> <a href="http://www.secs.oakland.edu/~djanders/html/submit.html">SubmitPost</a>
</div>
</div>
<div class="content_wrapper">
<div class="main">
Attn Admins: These are all the posts available sorted by what has not been approved yet. 
<p>
<?php 
	$dsn = "mysql:dbname=spoconno";
	$username = "spoconno";
	$password = "tacotruck";

	try {
	$conn = new PDO( $dsn, $username, $password );
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	} catch ( PDOException $e ) {
		echo "Connection failed: " . $e->getMessage();
	}

	$sql = "SELECT * FROM posts WHERE approval = 0";
	echo "<table border='1' cellpadding='1' cellspacing='0' bordercolor='#000000'>";
	
	
	try {
		$rows = $conn->query( $sql );
		foreach ( $rows as $row ) {
				
		echo "<tr><td><table width='90%' border='0' cellspacing='0' cellpadding='0'>";
		$image = $row["imageURL"];
		if ($image==null || $image=="")
		{
			$image = "../images/noimage150x150.png";
		//noimage.jpg
		}
		
		echo "
		<tr>
        <td width='150' height='150' rowspan='3'><img name='img' src='".$image."' width='150' height='150' alt='No image'></td>
        <td>".$row["title"]."</td>
        <td>". $row["price"] . "</td>
      </tr>
      <tr>
        <td rowspan='2'>". $row["description"] . "</td>
        <td>". $row["contactInfo"] . "</td>
		
      </tr>
      <tr>
        <td width='150'>". $row["firstName"] . " ". $row["lastName"] . " " . $row["postID"] ."</td>
      </tr>
	  <tr>
	  <form id='form1' name='" . $row["postID"] . "' method='post' action='adminmodify.php'>
    	<select name='select' >
    	<option selected>Please Select...</option>
   	 	<option>Approve ".$row["postID"]."</option>
    	<option>Delete ".$row["postID"]."</option>
    	<option>Email User ".$row["postID"]."</option>
    	</select>
		<input type='submit' name='Go' value='Go' />
		</form>
		</td></tr>
    </table> </td></tr> ";
	
	
	
	
	//-----------------------------------------------------------
		}
	}
	catch ( PDOException $e ) {
		echo "Query fialed: " . $e->getMessage();
	}
	echo "</table>";
	$conn = null;
?>

<p>

<p>
</div>
<div class="sidebar">
<p>
Sidebar
</p>
</div>
</div>
</div>
</body>
</html>



<body>
