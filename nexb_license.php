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
$sql = "SELECT nexb_license.*
FROM match_license, nexb_license, nexb_license_requirements, nexb_requirements
WHERE match_license.nexb_key = nexb_license.nexb_key AND
nexb_license.nexb_key = nexb_license_requirements.nexb_key AND
nexb_license_requirements.requirements = nexb_requirements.requirements AND
match_license.olex_key = '$key'";
$sql_ob ="SELECT nexb_requirements.*
FROM match_license, nexb_license, nexb_license_requirements, nexb_requirements
WHERE match_license.nexb_key = nexb_license.nexb_key AND
nexb_license.nexb_key = nexb_license_requirements.nexb_key AND
nexb_license_requirements.requirements = nexb_requirements.requirements AND
nexb_requirements.type = 'obligation' AND
match_license.olex_key = '$key'";
$sql_re ="SELECT nexb_requirements.*
FROM match_license, nexb_license, nexb_license_requirements, nexb_requirements
WHERE match_license.nexb_key = nexb_license.nexb_key AND
nexb_license.nexb_key = nexb_license_requirements.nexb_key AND
nexb_license_requirements.requirements = nexb_requirements.requirements AND
nexb_requirements.type = 'restrictions' AND
match_license.olex_key = '$key'";
$sql_po ="SELECT nexb_requirements.*
FROM match_license, nexb_license, nexb_license_requirements, nexb_requirements
WHERE match_license.nexb_key = nexb_license.nexb_key AND
nexb_license.nexb_key = nexb_license_requirements.nexb_key AND
nexb_license_requirements.requirements = nexb_requirements.requirements AND
nexb_requirements.type = 'policies' AND
match_license.olex_key = '$key'";
$sql_in ="SELECT nexb_requirements.*
FROM match_license, nexb_license, nexb_license_requirements, nexb_requirements
WHERE match_license.nexb_key = nexb_license.nexb_key AND
nexb_license.nexb_key = nexb_license_requirements.nexb_key AND
nexb_license_requirements.requirements = nexb_requirements.requirements AND
nexb_requirements.type = 'information' AND
match_license.olex_key = '$key'";
//execute query
$nexb_license=mysqli_query($con,$sql);
$obligation=mysqli_query($con,$sql_ob);
$restrictions=mysqli_query($con,$sql_re);
$policies=mysqli_query($con,$sql_po);
$information=mysqli_query($con,$sql_in);
//check query
if(! $nexb_license ) {
		die('Could not get data from nexb_license: ' . mysql_error());
 }
 if(! $obligation ) {
 		die('Could not get data from obligation: ' . mysql_error());
  }
  if(! $restrictions ) {
  		die('Could not get data from restrictions: ' . mysql_error());
   }
   if(! $policies ) {
   		die('Could not get data from policies: ' . mysql_error());
    }
    if(! $information ) {
       die('Could not get data from information: ' . mysql_error());
     }

$row = mysqli_fetch_array($nexb_license, MYSQL_ASSOC);
$nexb_key = $row['nexb_key'];
if ($nexb_key != '') {
    	echo
      "<table>".
      "<tr><td><strong> Name : </strong> {$row['nexb_name']} </td></tr>".
      "<tr><td><strong> Short Name : </strong> {$row['short_name']} </td></tr>".
      "<tr><td><strong> Guidance : </strong></td></tr>".
      "<tr><td> {$row['guidance']} </tr></td>".
      "<tr><td><strong> Category : </strong> {$row['category']} </td></tr>".
      "<tr><td><strong> License Type : </strong> {$row['license_type']} </td></tr>".
      "<tr><td><strong> License Profile : </strong> {$row['license_profile']} </td></tr>".
      "<tr><td><strong> License Style : </strong> {$row['license_style']} </td></tr>".
      "<tr><td><strong> Publication Year : </strong> {$row['publication_year']} </td></tr>".
      "<tr><td><strong> Special Obligations : </strong></td></tr>".
      "<tr><td> {$row['license_type']} </td></tr>".
      "<tr><td><strong> Homepage URL : </strong></td></tr>".
      "<tr><td><a href='{$row['homepage_url']}'> {$row['homepage_url']}</a></td></tr>".
      "<tr><td><strong> Text URL: </strong></td></tr>".
      "<tr><td><a href='{$row['text_urls']}'> {$row['text_urls']}</a></td></tr>".
      "<tr><td><strong> OSI URL : </strong></td></tr>".
      "<tr><td><a href='{$row['osi_url']}'> {$row['osi_url']}</a></td></tr>".
      "<tr><td><strong> FAQ URL : </strong></td></tr>".
      "<tr><td><a href='{$row['faq_url']}'> {$row['faq_url']}</a></td></tr>".
      "<tr><td><strong> Other URLs : </strong></td></tr>".
      "<tr><td><a href='{$row['other_urls']}'> {$row['other_urls']}</a>  </td></tr>".
      "<tr><td><strong> Owner : </strong> {$row['owner_name']} </td></tr>".
      "<tr><td><strong> Owner Type : </strong> {$row['owner_type']} </td></tr>".
      "<tr><td><strong> Alias : </strong> {$row['alias']} </td></tr>".
      "<tr><td><strong> Owner Homepage URL: </strong></td></tr>".
      "<tr><td><a href='{$row['owner_homepage_url']}'> {$row['owner_homepage_url']}</a></td></tr>".
      "<tr><td><strong> Contact Information : </strong></td></tr>".
      "<tr><td> {$row['contact_information']} </td></tr>".
      "<tr><td><strong> Owner Notes : </strong></td></tr>".
      "<tr><td> {$row['owner_notes']} </td></tr>".
      "</table><hr>".
      "<table>".
      "<tr><td><h3> License Requirements </h3></td></tr>".
      //obligation
      "<tr><td><strong> Obligations </strong></td></tr>".
      "<tr><td>";
      while ($row = mysqli_fetch_array($obligation, MYSQL_ASSOC)){
        echo  "<div><strong>{$row['requirements']}</strong><br>{$row['description']}</div>";
      }
      echo "</td></tr>".
      //restrictions
      "<tr><td><strong> Restrictions </strong></td></tr>".
      "<tr><td>";
      while ($row = mysqli_fetch_array($restrictions, MYSQL_ASSOC)){
        echo  "<div><strong>{$row['requirements']}</strong><br>{$row['description']}</div>";
      }
      echo "</td></tr>".
      //policies
      "<tr><td><strong> Policies </strong></td></tr>".
      "<tr><td>";
      while ($row = mysqli_fetch_array($policies, MYSQL_ASSOC)){
        echo  "<div><strong>{$row['requirements']}</strong><br>{$row['description']}</div>";
      }
      echo "</td></tr>".
      //information
      "<tr><td><strong> Information </strong></td></tr>".
      "<tr><td>";
      while ($row = mysqli_fetch_array($information, MYSQL_ASSOC)){
        echo  "<div><strong>{$row['requirements']}</strong><br>{$row['description']}</div>";
      }
        echo "</td></tr></table>";
  }
mysqli_close($con);
?>
