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
<br />

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
echo "<br> 1 record added";

mysql_close($con);


?> 


</body>
</html>
