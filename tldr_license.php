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
$sql = "SELECT tldr_license.*, requirements
FROM match_license, tldr_license, tldr_requirements
WHERE match_license.tldr_key = tldr_license.tldr_key AND
tldr_license.tldr_key = tldr_requirements.tldr_key AND
match_license.olex_key = '$key'";
$sql_can = "SELECT requirements
FROM match_license, tldr_license, tldr_requirements
WHERE match_license.tldr_key = tldr_license.tldr_key AND
tldr_license.tldr_key = tldr_requirements.tldr_key AND
tldr_requirements.type = 'can' AND
match_license.olex_key = '$key'";
$sql_cannot = "SELECT requirements
FROM match_license, tldr_license, tldr_requirements
WHERE match_license.tldr_key = tldr_license.tldr_key AND
tldr_license.tldr_key = tldr_requirements.tldr_key AND
tldr_requirements.type = 'cannot' AND
match_license.olex_key = '$key'";
$sql_must = "SELECT requirements
FROM match_license, tldr_license, tldr_requirements
WHERE match_license.tldr_key = tldr_license.tldr_key AND
tldr_license.tldr_key = tldr_requirements.tldr_key AND
tldr_requirements.type = 'must' AND
match_license.olex_key = '$key'";
//execute query
$tldr_license=mysqli_query($con,$sql);
$requirements_can=mysqli_query($con,$sql_can);
$requirements_cannot=mysqli_query($con,$sql_cannot);
$requirements_must=mysqli_query($con,$sql_must);
//check query
if(! $tldr_license ) {
		die('Could not get data from tldr_license: ' . mysql_error());
 }
 if(! $requirements_can ) {
 		die('Could not get data from CAN requirements : ' . mysql_error());
  }
  if(! $requirements_cannot ) {
  		die('Could not get data from CANNOT requirements : ' . mysql_error());
   }
   if(! $requirements_must ) {
   		die('Could not get data from MUST requirements : ' . mysql_error());
    }


$row = mysqli_fetch_array($tldr_license, MYSQL_ASSOC);
$tldr_key = $row['tldr_key'];
if ($tldr_key != '') {
    	echo
      "<table>".
      "<tr><td><strong> Name : </strong> {$row['tldr_name']} </td></tr>".
      "<tr><td><strong> Homepage URL : </strong></td></tr>".
      "<tr><td><a href='{$row['tldr_url']}'> {$row['tldr_url']}</a></td></tr>".
      "<tr><td><strong> Summary : </strong></td></tr>".
      "<tr><td> {$row['summary']} </td></tr>".
      "</table><hr>".
      "<table style='width:50%;'>".
      "<tr><td><h3> License Requirements </h3></td></tr>".
      //can
      "<tr><td class='green'><strong> CAN </strong></td></tr>".
      "<tr><td>";
      while ($row = mysqli_fetch_array($requirements_can, MYSQL_ASSOC)){
        echo  "<div>{$row['requirements']}<br></div>";
      }
      echo "</td></tr>".
      //cannot
      "<tr><td class='red'><strong> CANNOT </strong></td></tr>".
      "<tr><td>";
      while ($row = mysqli_fetch_array($requirements_cannot, MYSQL_ASSOC)){
        echo  "<div>{$row['requirements']}<br></div>";
      }
      echo "</td></tr>".
      //must
      "<tr><td class='blue'><strong> MUST </strong></td></tr>".
      "<tr><td>";
      while ($row = mysqli_fetch_array($requirements_must, MYSQL_ASSOC)){
        echo  "<div>{$row['requirements']}<br></div>";
      }
        echo "</td></tr></table>";
  }
mysqli_close($con);
?>
