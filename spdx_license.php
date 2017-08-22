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
$sql = "SELECT spdx_license.*
FROM spdx_license, match_license
WHERE match_license.SPDX_key = spdx_license.SPDX_key AND
match_license.olex_key = '$key'";

$result=mysqli_query($con,$sql);
//check query
if(! $result ) {
		die('Could not get data: ' . mysql_error());
 }

$row = mysqli_fetch_array($result, MYSQL_ASSOC);
$SPDX_key = $row['SPDX_key'];
if ($SPDX_key != '') {
  echo
   "<table><tr><td><strong> LICENSE NAME : </strong> {$row['SPDX_fullname']} </td></tr>".
	 "<tr><td><strong> Source URL :</strong></td></tr>".
   "<tr><td><a href='{$row['SPDX_source_url']}'>{$row['SPDX_source_url']}</a></td></tr>".
   "<tr><td><strong> Notes :</strong></td></tr>".
   "<tr><td> {$row['SPDX_notes']} </td></tr>".
	 "<tr><td><strong> Standard License Header :</strong></td></tr>".
 	"<tr><td class ='italic'> {$row['license_header']} </td></tr></table>";

}

mysqli_close($con);
?>
