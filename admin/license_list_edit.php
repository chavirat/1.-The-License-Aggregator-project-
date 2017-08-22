<html>
<head>
  <script src="js/jsscript.js"></script>
</head>
<body>
  <ul class="nav nav-tabs">
    <li><a data-toggle="tab" href="#editolex">Olex license</a></li>
    <li><a data-toggle="tab" href="#editnexb">Nexb license</a></li>
    <li><a data-toggle="tab" href="#editspdx">SPDX license</a></li>
    <li><a data-toggle="tab" href="#edittldr">Tldr license</a></li>
    <li><a data-toggle="tab" href="#editmatch">Match license</a></li>
    <li><a data-toggle="tab" href="#editolexob">Olex obligation</a></li>
    <li><a data-toggle="tab" href="#editnexbob">Nexb obligation</a></li>
  </ul>
<?php
include 'sql_connect.php';
// Create connection
$con = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//echo "Connected successfully <br>";

//olex_license query
$sql_olex = 'SELECT * FROM olex_license ORDER BY name';

$result_olex=mysqli_query($con,$sql_olex);
//check query
if(! $result_olex ) {
		die('Could not get data from olex_license: ' . mysql_error());
 }
 echo
 "<div class='tab-content'>".
    "<div id='editolex' class='tab-pane fade in active'>".
     "<table class='table table-hover'>".
     "<tr><th colspan ='2'>Olex license list</th></tr>";
// Associative array
while($row = mysqli_fetch_array($result_olex, MYSQL_ASSOC))
{
	echo
	"<tr>".
	"<td> {$row['name']} </td> ".
  "<td><a class='btn btn-primary' href ='edit_olex.php?olex_key={$row['olex_key']}'> Update / Delete </a></td> ".
	"</tr>";
}
echo "</table></div>";
//nexb_license query
$sql_nexb = 'SELECT * FROM nexb_license ORDER BY nexb_name';

$result_nexb=mysqli_query($con,$sql_nexb);
//check query
if(! $result_nexb ) {
		die('Could not get data from nexb_license: ' . mysql_error());
 }
 echo  "<div id='editnexb' class='tab-pane fade'>".
 "<table class='table table-hover'>".
 "<tr><th colspan ='3'> Nexb license list </th></tr>";
// Associative array
while($row = mysqli_fetch_array($result_nexb, MYSQL_ASSOC))
{
	echo
	"<tr>".
	"<td> {$row['nexb_name']} </td> ".
  "<td><a class='btn btn-primary' href ='edit_nexb.php?nexb_key={$row['nexb_key']}' > Update / Delete </a></td> ".
	"</tr>";
}
echo "</table></div>";
//spdx_license query
$sql_spdx = 'SELECT * FROM spdx_license ORDER BY SPDX_fullname';

$result_spdx=mysqli_query($con,$sql_spdx);
//check query
if(! $result_spdx ) {
		die('Could not get data from spdx_license: ' . mysql_error());
 }
 echo  "<div id='editspdx' class='tab-pane fade'>".
 "<table class='table table-hover'>".
 "<tr><th colspan ='3'> SPDX license list</th></tr>";
// Associative array
while($row = mysqli_fetch_array($result_spdx, MYSQL_ASSOC))
{
	echo
	"<tr>".
	"<td> {$row['SPDX_fullname']} </td> ".
  "<td><a class='btn btn-primary' href ='edit_spdx.php?SPDX_key={$row['SPDX_key']}'> Update / Delete </a></a></td> ".
	"</tr>";
}
echo "</table></div>";
//tldr_license query
$sql_tldr = 'SELECT * FROM tldr_license ORDER BY tldr_name';

$result_tldr = mysqli_query($con,$sql_tldr);
//check query
if(! $result_tldr ) {
		die('Could not get data from tldr_license: ' . mysql_error());
 }
 echo  "<div id='edittldr' class='tab-pane fade'>".
 "<table class='table table-hover'>".
 "<tr><th colspan ='3'> Tldr license list</th></tr>";
// Associative array
while($row = mysqli_fetch_array($result_tldr, MYSQL_ASSOC))
{
	echo
	"<tr>".
	"<td> {$row['tldr_name']} </td> ".
  "<td><a class='btn btn-primary' href ='edit_tldr.php?tldr_key={$row['tldr_key']}' >Update / Delete  </a></td> ".
	"</tr>";
}
echo "</table></div>";
//match_license query
$sql_match = 'SELECT * FROM match_license ORDER BY olex_key';

$result_match = mysqli_query($con,$sql_match);
//check match_license query
if(! $result_match ) {
		die('Could not get data from match_license: ' . mysql_error());
 }
 echo  "<div id='editmatch' class='tab-pane fade'>".
 "<h3>Match Licenses</<h3>".
 "<table class='table table-bordered'>".
 "<tr>"."<th>Olex_key</th>".
 "<th>Nexb_key</th>".
 "<th>SPDX_key</th>".
 "<th>Tldr_key</th>".
 "<th></th></tr>";
// Associative array of match_license
while($row = mysqli_fetch_array($result_match, MYSQL_ASSOC))
{
	echo
	"<tr>".
	"<td> {$row['olex_key']} </td> ".
  "<td> {$row['nexb_key']} </td> ".
  "<td> {$row['SPDX_key']} </td> ".
  "<td> {$row['tldr_key']} </td> ".
  "<td><a class='btn btn-primary' href ='edit_match.php?olex_key={$row['olex_key']}'> Update / Delete </a></td> ".
	"</tr>";
}
echo "</table></div>";
//olex_obligation query
$sql_olex_ob = 'SELECT * FROM olex_obligation ORDER BY shortened';

$result_olex_ob = mysqli_query($con,$sql_olex_ob);
//check olex_obligation query
if(! $result_olex_ob ) {
		die('Could not get data from olex_obligation: ' . mysql_error());
 }
 echo  "<div id='editolexob' class='tab-pane fade'>".
 "<table class='table table-bordered'>".
 "<tr>".
 "<th colspan='2'>Olex Obligation Shortened Name</th>".
 "</tr>";
// Associative array of olex_obligation
while($row = mysqli_fetch_array($result_olex_ob, MYSQL_ASSOC))
{
	echo
	"<tr>".
	"<td> {$row['shortened']} </td> ".
  "<td><a class='btn btn-primary' href ='edit_olex_ob.php?code={$row['olex_obligation_code']}'> Update / Delete </a></td> ".
	"</tr>";
}
echo "</table></div>";
//nexb_requirements query
$nexb_ob = "SELECT * FROM nexb_requirements WHERE type = 'obligation'";
$nexb_re = "SELECT * FROM nexb_requirements WHERE type = 'restrictions'";
$nexb_po = "SELECT * FROM nexb_requirements WHERE type = 'policies'";
$nexb_in = "SELECT * FROM nexb_requirements WHERE type = 'information'";

$result_nexb_ob = mysqli_query($con,$nexb_ob);
$result_nexb_re = mysqli_query($con,$nexb_re);
$result_nexb_po = mysqli_query($con,$nexb_po);
$result_nexb_in = mysqli_query($con,$nexb_in);
//check nexb_requirements query
if(! $result_nexb_ob ) {
		die('Could not get data from nexb_requirements for obligation type: ' . mysql_error());
 }
 if(! $result_nexb_re ) {
 		die('Could not get data from nexb_requirements for restriction type: ' . mysql_error());
  }
  if(! $result_nexb_po ) {
     die('Could not get data from nexb_requirements for policies type: ' . mysql_error());
   }
   if(! $result_nexb_in ) {
   		die('Could not get data from nexb_requirements for information type: ' . mysql_error());
    }
 echo  "<div id='editnexbob' class='tab-pane fade'>".
 "<table class='table table-bordered'>".
 "<tr style='background-color: #d1e9ff;'><td colspan='2'><strong>Obligation</strong></td></tr>";
// Associative array of nexb_requirements for obligation type
while($row = mysqli_fetch_array($result_nexb_ob, MYSQL_ASSOC))
{
	echo
	"<tr><td><strong> {$row['requirements']} </strong><br> ".
  " {$row['description']} </td>".
  "<td><a class='btn btn-primary' href ='edit_nexb_ob.php?code={$row['requirements']}'> Update / Delete </a></td> ".
	"</tr>";
}
// Associative array of nexb_requirements for restiction type
echo "<tr style='background-color: #d1e9ff;'><td colspan ='2'><strong>Restriction</strong></td></tr>";
while($row = mysqli_fetch_array($result_nexb_re, MYSQL_ASSOC))
{
	echo
	"<tr><td><strong> {$row['requirements']} </strong><br> ".
  " {$row['description']} </td>".
  "<td><a class='btn btn-primary' href ='edit_nexb_ob.php?code={$row['requirements']}'> Update / Delete </a></td> ".
	"</tr>";
}
// Associative array of nexb_requirements for policies type
echo "<tr style='background-color: #d1e9ff;'><td colspan ='2'><strong>Policies</strong></td></tr>";
while($row = mysqli_fetch_array($result_nexb_po, MYSQL_ASSOC))
{
	echo
	"<tr><td><strong> {$row['requirements']} </strong><br> ".
  "{$row['description']} </td>".
  "<td><a class='btn btn-primary' href ='edit_nexb_ob.php?code={$row['requirements']}'> Update / Delete </a></td> ".
	"</tr>";
}
// Associative array of nexb_requirements for information type
echo "<tr style='background-color: #d1e9ff;'><td colspan ='2'><strong>Information</strong></td></tr>";
while($row = mysqli_fetch_array($result_nexb_in, MYSQL_ASSOC))
{
	echo
	"<tr><td><strong> {$row['requirements']} </strong><br> ".
  "{$row['description']} </td>".
  "<td><a class='btn btn-primary' href ='edit_nexb_ob.php?code={$row['requirements']}'> Update / Delete </a></td> ".
	"</tr>";
}
echo "</table></div>";
//end tab
echo "</div></div>";
mysqli_close($con);
?>
</body>
</html>
