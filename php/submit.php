<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<meta http-equiv="Refresh" content="3;url=http://www.secs.oakland.edu/~djanders/php/wall.php">
<title>Submit</title>
</head>

<body>


<p>Welcome:  <?php echo $_POST["fName"]; ?><br />
Last Name: <?php echo $_POST["lName"]; ?> <br />
Password: <?php echo $_POST["email"]; ?><br />
Title: <?php echo $_POST["title"]; ?> <br />
Select: <?php echo $_POST["select"]; ?><br />
Photo: <?php echo $_POST["img"]; ?><br />
Description: <?php echo $_POST["description"]; ?></p>
<p>REDIRECTING in 3 seconds... <br />
  
  <?php


$con = mysql_connect("localhost","spoconno","tacotruck");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("spoconno", $con);

$t = time();
$sql = "INSERT INTO posts (lastName, firstName, title, description, imageURL, price, contactInfo, category, postId)	values ('$_POST[lName]', '$_POST[fName]', '$_POST[title]', '$_POST[description]', '$_POST[img]', '$_POST[price]', '$_POST[email]', '$_POST[select]', '$t')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "<br> 1 record added";
mail("spoconno@oakland.edu", "PostRequest", "A record has been created with post ID: " . $t , "postId = " . $t);
mysql_close($con);


?> 
  
  
</p>
</body>
</html>
