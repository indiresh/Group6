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
<p>
<form action="categories.php" method="post">
<select name="select" >
<option selected>Please Select...</option>
    <option>Books</option>
    <option>Events</option>
    <option>Projects</option>
    <option>Tutoring</option>
    <option>Housing</option>
    <option>Other</option>
    </select>
<input type="submit">
</form>

    
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

	$sql = "SELECT * FROM posts WHERE category='". $_POST["select"]."'" ;
	echo "<table border='1' cellpadding='1' cellspacing='0' bordercolor='#000000'>";
	
	
	try {
		$rows = $conn->query( $sql );
		foreach ( $rows as $row ) {
				
		echo "<tr><td><table width='100%' border='0' cellspacing='0' cellpadding='0'>";
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
        <td width='150'>". $row["firstName"] . " ". $row["lastName"] . "</td>
      </tr>
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