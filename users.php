<?php
require 'db.php';

$sql= "SELECT * FROM members";
$result=mysqli_query($sql);


?>

<!DOCTYPE html>
<html>
<head>
	<title>users</title>
</head>
<body>
<table width=600>
   <tr>
   	<td>firstname</td>
   	<td>lastname</td>
   	<td>email</td>
   	<td>password</td>
   </tr>

   <?

   while($members=mysqli_fetch_assoc($result))

   	echo "<tr>";
    	echo "<td>".$members."[first_name]" "</td";
    		echo "<td>".$members."[last_name]" "</td";
    			echo "<td>".$members."[email]" "</td";
    				echo "<td>".$members."[password]" "</td";
    				echo "</tr>"
   ?>
</body>
</html>>