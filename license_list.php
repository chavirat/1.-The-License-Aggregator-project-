<?php
include 'admin/sql_connect.php';
// Create connection
$con = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 echo "<table class='table table-striped' border ='1'>".
 "<tr>".
 "<th><a class='whitelink' href='?orderBy=name'>LICENSE NAME (A-Z)</a></th>".
 "<th><a class='whitelink' href='?orderBy=model'>MODEL</a></th>".
 "<th><a class='whitelink' href='?orderBy=class'>CLASS</a></th>".
"<th><a class='whitelink' href='?orderBy=license_base'>LICENSE BASE</a></th>".
 "</tr>";
 $orderBy = array('name', 'model', 'class','license_base');

 $order = 'name';
 if (isset($_GET['orderBy']) && in_array($_GET['orderBy'], $orderBy)) {
     $order = $_GET['orderBy'];
 }
 $sql = 'SELECT * FROM olex_license ORDER BY '.$order;
 $result=mysqli_query($con,$sql);
 if(! $result ) {
 		die('Could not get data: ' . mysql_error());
  }
// Associative array
while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
{
	echo
	"<tr>".
	"<td><a href ='license_info.php?olex_key={$row['olex_key']}'> {$row['name']} </a></td> ".
	"<td> {$row['model']} </td> ".
	"<td> {$row['class']} </td> ".
	"<td> {$row['license_base']} </td> ".
	"</tr>";
}
echo "</table>";
mysqli_close($con);
?>
