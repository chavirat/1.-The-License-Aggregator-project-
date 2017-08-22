<html>
<head>
  <link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" rel="stylesheet"></link>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script crossorigin="anonymous" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<?php
  include 'sql_connect.php';
  // Create connection
  $con = mysqli_connect($servername, $username, $password,$dbname);
  // Check connection
  if (mysqli_connect_errno())
  {
  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $nexb_key =  $_POST['nexb_key'];
  //echo "<strong>nexb_key = </strong>".$nexb_key."<br>";
  $nexb_name =  $_POST['nexb_name'];
  //echo "<strong>nexb name = </strong>".$nexb_name."<br>";
  $short_name =  $_POST['short_name'];
//  echo "<strong>short name = </strong>".$short_name."<br>";
  $guidance =  $_POST['guidance'];
//  echo "<strong>guidance = </strong>".$guidance."<br>";
  $category =  $_POST['category'];
//  echo "<strong>category = </strong>".$category."<br>";
  $license_type =  $_POST['license_type'];
//  echo "<strong>License type = </strong>".$license_type."<br>";
  $license_profile =  $_POST['license_profile'];
//  echo "<strong>license profile = </strong>".$license_profile."<br>";
  $license_style =  $_POST['license_style'];
//  echo "<strong>license style = </strong>".$license_style."<br>";
  $SPDX_key =  $_POST['SPDX_key'];
//  echo "<strong>SPDX key = </strong>".$SPDX_key."<br>";
  $publication_year =  $_POST['publication_year'];
//  echo "<strong>publication year = </strong>".$publication_year."<br>";
  $keywords =  $_POST['keywords'];
//  echo "<strong>keywords = </strong>".$keywords."<br>";
  $special_obligations =  $_POST['special_obligations'];
//  echo "<strong>special obligations = </strong>".$special_obligations."<br>";
  $homepage_url =  $_POST['homepage_url'];
//  echo "<strong>homepage url = </strong>".$homepage_url."<br>";
  $text_url =  $_POST['text_url'];
//  echo "<strong>text url = </strong>".$text_url."<br>";
  $osi_url =  $_POST['osi_url'];
//  echo "<strong>osi url = </strong>".$osi_url."<br>";
  $faq_url =  $_POST['faq_url'];
//  echo "<strong>faq url = </strong>".$faq_url."<br>";
  $guidance_url =  $_POST['guidance_url'];
//  echo "<strong>guidance url  = </strong>".$guidance_url."<br>";
  $other_urls =  $_POST['other_urls'];
//  echo "<strong>other url  = </strong>".$other_urls."<br>";
  $owner_name =  $_POST['owner_name'];
//  echo "<strong>owner name = </strong>".$owner_name."<br>";
  $owner_homepage_url =  $_POST['owner_homepage_url'];
//  echo "<strong>owner homepage url = </strong>".$owner_homepage_url."<br>";
  $owner_type =  $_POST['owner_type'];
//  echo "<strong>owner type = </strong>".$owner_type."<br>";
  $contact_information =  $_POST['contact_information'];
//  echo "<strong>contact information = </strong>".$contact_information."<br>";
  $alias =  $_POST['alias'];
//  echo "<strong>alias = </strong>".$alias."<br>";
  $owner_notes =  $_POST['owner_notes'];
//query update in nexb_license table
$update_nexb = "UPDATE nexb_license SET nexb_name = '$nexb_name',	short_name='$short_name',guidance='$guidance',	category='$category',	license_type='$license_type',
license_profile='$license_profile',	license_style	='$license_style',owner='$owner_name',
SPDX_key='$SPDX_key',	publication_year='$publication_year',	keywords='$keywords',
special_obligations='$special_obligations'	,homepage_url='$homepage_url',text_urls='$text_url',
osi_url='$osi_url',faq_url='$faq_url',guidance_url='$guidance_url',	other_urls='$other_urls',
owner_name='$owner_name', owner_homepage_url='$owner_homepage_url',	owner_type='$owner_type',
contact_information='$contact_information',alias='$alias',owner_notes='$owner_notes'
WHERE nexb_key='$nexb_key'";

$result_update_nexb = mysqli_query($con,$update_nexb);
//check query
 if(! $result_update_nexb) {
     echo
     "<form action='admin.php' method='post'>".
     "<input type='hidden' name='username' value ='admin'>".
     "<input type='hidden' name='password' value='password'>".
     "<input class='btn btn-danger' type='submit' value ='Back'></form>";
 		die("<div class='alert alert-danger'><strong>Error : </strong> Could not update data into nexb_license:</div>" . mysql_error());
  }
  else{
    echo
    "<form action='admin.php' method='post'>".
    "<input type='hidden' name='username' value ='admin'>".
    "<input type='hidden' name='password' value='password'>".
    "<input class='btn btn-success' type='submit' value ='Back'></form>".
    "<div class='alert alert-success'><strong>Success : </strong>".
    $nexb_key." already updated into nexb_license table."."</div>";
  }
 mysqli_close($con);
  ?>
</body>
</html>
