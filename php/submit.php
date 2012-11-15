<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Submit</title>
</head>

<body>


Welcome:  <?php echo $_POST["fName"]; ?><br />
Last Name: <?php echo $_POST["lName"]; ?> <br />
Password: <?php echo $_POST["email"]; ?><br />
Title: <?php echo $_POST["title"]; ?> <br />
Select: <?php echo $_POST["select"]; ?><br />
Photo: <?php echo $_POST["img"]; ?><br />
Description: <?php echo $_POST["description"]; ?>

<?php
$con = mysql_connect("localhost","spoconno","tacotruck");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("spoconno", $con);


$sql = "INSERT INTO posts (lastName, firstName, title, description, imageURL, price, contactInfo, category)	values ('$_POST[lName]', '$_POST[fName]', '$_POST[title]', '$_POST[description]', '$_POST[img]', '$_POST[price]', '$_POST[email]', '$_POST[select]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";

mysql_close($con);
?> 

<?php echo $_POST["title"];/*
	$dsn = "mysql:dbname=spoconno";
	$username = "spoconno";
	$password = "tacotruck";

	try {
	$conn = new PDO( $dsn, $username, $password );
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	} catch ( PDOException $e ) {
		echo "Connection failed: " . $e->getMessage();
	}

	
	
	$sql = "INSERT INTO posts (lastName, firstName, title, description, imageURL, price, contactInfo, category)	values ('$_POST[lName]', '$_POST[fName]', '$_POST[title]', '$_POST[description]', '$_POST[img]', '$_POST[price]', '$_POST[email]', '$_POST[select]')";
	
	$sql = "SELECT * FROM posts";
	echo "<ul>";
	
	try {
		$rows = $conn->query( $sql );
		foreach ( $rows as $row ) {
			echo "<li>lastName: " . $row["lastName"] . " firstName: " . $row["firstName"] . "</li>";
			echo "<li>title: " . $row["title"] . " description: " . $row["description"] . "</li>";
			echo "<li>imageURL: " . $row["imageURL"] . " price: " . $row["price"] . "</li>";
			echo "<li>contactInfo: " . $row["contactInfo"] . " category: " . $row["category"] . "</li>";
			echo "<li>postTime: " . $row["postTime"] . " approval: " . $row["approval"] . "</li>";
			echo "<li>terminateDate: " . $row["terminateDate"] . " postID: " . $row["postID"] . "</li>";
		}
	}
	catch ( PDOException $e ) {
		echo "Query fialed: " . $e->getMessage();
	}
	echo "</ul>";
	$conn = null;*/
?>	
</body>
</html>
