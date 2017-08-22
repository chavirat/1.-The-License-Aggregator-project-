<?php
include 'admin/sql_connect.php';
// Create connection
$con = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//echo "Connected successfully <br>";
$key =  $_GET['olex_key'];
//query
$sql = "SELECT olex_license.*,olex_obligation.shortened FROM olex_license, olex_license_obligation, olex_obligation
WHERE olex_license.olex_key = olex_license_obligation.olex_key AND
olex_license_obligation.olex_obligation_code = olex_obligation.olex_obligation_code AND
olex_license.olex_key = '$key'";

$result=mysqli_query($con,$sql);
//check query
if(! $result ) {
		die('Could not get data from olex_license: ' . mysql_error());
 }

$row = mysqli_fetch_array($result, MYSQL_ASSOC);
	echo
  "<table><tr>".
  "<th colspan='2'><h1> {$row['name']}</h1> </th>".
  "</tr>".
  "<tr>".
  "<td><strong> MODEL :</strong> {$row['model']} </td>".
	"<td><strong> CLASS :</strong> {$row['class']} </td> ".
	"</tr>".
  "<tr>".
  "<td><strong> LICENSE BASE : </strong>{$row['license_base']} </td>".
  "<td><a class='btn btn-default' href='{$row['url']}'> TEXT</a></td>".
  "</tr>".
  "<tr>".
  "</table>".
  "<table><tr>".
  "<td><strong> OBLIGATIONS </strong></td></tr>".
  "<tr><td>";
  while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
    echo "{$row['shortened']} <br>";
  }
  echo "</td></tr>".
  "</table>";
mysqli_close($con);
?>
