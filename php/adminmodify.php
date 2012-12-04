<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Refresh" content="3;url=http://www.secs.oakland.edu/~djanders/php/wall.php">

<title>ADMIN MOD</title>
</head>

<body>
  
Select: 
<?php 

$con = mysql_connect("localhost","spoconno","tacotruck");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("spoconno", $con);

echo $_POST["select"]; 
$nameord = ord($_POST["select"]);

if ($nameord == "65" ){
    	
		echo "Thank you this post has been approved. And you win the internet!";
		$selectNum = str_ireplace("Approve","",$_POST["select"]);
		$selectName = str_ireplace($selectNum,"",$_POST["select"]);
		$selectNum = trim($selectNum);
		$selectName = trim($selectName);
		$sql = "UPDATE posts SET approval = 1 WHERE postID='$selectNum'";
}
else if ($nameord == "68" ){
    	
		echo "Thank you this post has been Deleted. And you win the internet!";
		$selectNum = str_ireplace("Delete","",$_POST["select"]);
		$selectName = str_ireplace($selectNum,"",$_POST["select"]);
		$selectNum = trim($selectNum);
		$selectName = trim($selectName);
		echo "<p>This is the select number:</p>".$selectNum;
		$sql = "DELETE FROM posts WHERE postID='".$selectNum."'";
		
} 

else {
	echo "ERROR. And I win the internet!";
}

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }	
  header("Location: admin.php");
?>

</body>
</html>
