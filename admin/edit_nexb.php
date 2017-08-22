<html>
<head>
  <script src="js/jsscript.js"></script>
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
  //pass the key
  $key =  $_GET['nexb_key'];
  //query
  $sql_nexb = "SELECT * FROM nexb_license
  WHERE nexb_key = '$key'";

  $result_sql_nexb=mysqli_query($con,$sql_nexb);
  //check query
  if(! $result_sql_nexb ) {
  		die('Could not get data from nexb_license: ' . mysql_error());
   }
   $row = mysqli_fetch_array($result_sql_nexb, MYSQL_ASSOC);
    echo
    "<form class='form-horizontal' action='update_nexb.php' method='post'>".
      "<div class='form-group'>".
        "<label  class='col-sm-2 control-label'>Nexb license key</label>".
        "<div class='col-sm-2'>".
          "<label  class='control-label' style='color:#3e8cd2;'>{$row['nexb_key']}</label>".
          "<input type='hidden' class='form-control' name ='nexb_key' value='{$row['nexb_key']}'>".
        "</div>".
        "<label  class='col-sm-2 control-label'>Nexb license name</label>".
        "<div class='col-sm-2'>".
          "<input type='text' class='form-control' name ='nexb_name' value='{$row['nexb_name']}'>".
        "</div>".
        "<label  class='col-sm-2 control-label'>Nexb short name</label>".
        "<div class='col-sm-2'>".
          "<input type='text' class='form-control' name ='short_name' value='{$row['short_name']}'>".
        "</div>".
      "</div>".
      "<div class='form-group'>".
        "<label  for='guidance' class='col-sm-2 control-label'>Guidance</label>".
        "<div class='col-sm-10'>".
        "<textarea class='form-control' rows='5' name='guidance'>{$row['guidance']}</textarea>".
        "</div>".
      "</div>".
    "<div class='form-group'>".
      "<label class='col-sm-2 control-label'>Category</label>".
      "<div class='col-sm-10'>".
        "<input type='text' class='form-control' name ='category' value='{$row['category']}'>".
      "</div>".
    "</div>".
        "<div class='form-group'>".
          "<label class='col-sm-2 control-label'>License type</label>".
          "<div class='col-sm-2'>".
            "<input type='text' class='form-control'  name ='license_type' value='{$row['license_type']}'>".
          "</div>".
        "  <label class='col-sm-2 control-label'>License Profile</label>".
          "<div class='col-sm-2'>".
            "<input type='text' class='form-control'   name ='license_profile' value='{$row['license_profile']}'>".
          "</div>".
          "<label class='col-sm-2 control-label'>License Style</label>".
          "<div class='col-sm-2'>".
            "<input type='text' class='form-control'   name ='license_style' value='{$row['license_style']}'>".
          "</div>".
        "</div>".
      "<div class='form-group'>".
      "  <label class='col-sm-2 control-label'>SPDX license key</label>".
        "<div class='col-sm-2'>".
          "<input type='text' class='form-control'  name ='SPDX_key' value='{$row['SPDX_key']}'>".
        "</div>".
        "<label class='col-sm-2 control-label'>Publication Year</label>".
        "<div class='col-sm-2'>".
        "  <input type='text' class='form-control'  name ='publication_year' value='{$row['publication_year']}'>".
        "</div>".
        "<label class='col-sm-2 control-label'>Keywords</label>".
        "<div class='col-sm-2'>".
        "  <input type='text' class='form-control'  name ='keywords' value='{$row['keywords']}'>".
        "</div>".
      "</div>".
      "<div class='form-group'>".
        "<label  for='guidance' class='col-sm-2 control-label'>Special Obligation</label>".
        "<div class='col-sm-10'>".
        "<textarea class='form-control' rows='3' name='special_obligations'>{$row['special_obligations']}</textarea>".
        "</div>".
      "</div>".
      "<div class='form-group'>".
      "  <label class='col-sm-2 control-label'>homepage url</label>".
        "<div class='col-sm-10'>".
          "<input type='url' class='form-control'  name ='homepage_url' value='{$row['homepage_url']}'>".
        "</div>".
      "</div>".
      "<div class='form-group'>".
      "  <label class='col-sm-2 control-label'>text url</label>".
        "<div class='col-sm-10'>".
          "<input type='url' class='form-control'  name ='text_url'value='{$row['text_urls']}'>".
        "</div>".
      "</div>".
      "<div class='form-group'>".
      "  <label class='col-sm-2 control-label'>osi url</label>".
        "<div class='col-sm-10'>".
          "<input type='url' class='form-control'  name ='osi_url' value='{$row['osi_url']}'>".
        "</div>".
      "</div>".
      "<div class='form-group'>".
        "<label class='col-sm-2 control-label'>faq url</label>".
        "<div class='col-sm-10'>".
          "<input type='url' class='form-control'  name ='faq_url' value='{$row['faq_url']}'>".
        "</div>".
      "</div>".
      "<div class='form-group'>".
        "<label class='col-sm-2 control-label'>guidance url</label>".
        "<div class='col-sm-10'>".
          "<input type='url' class='form-control'  name ='guidance_url' value='{$row['guidance_url']}'>".
        "</div>".
      "</div>".
      "<div class='form-group'>".
        "<label class='col-sm-2 control-label'>other url</label>".
        "<div class='col-sm-10'>".
          "<input type='url' class='form-control'  name ='other_urls' value='{$row['other_urls']}'>".
        "</div>".
      "</div>".
      "<div class='form-group'>".
        "<label class='col-sm-2 control-label'>Owner Name</label>".
        "<div class='col-sm-2'>".
          "<input type='text' class='form-control'  name ='owner_name' value='{$row['owner_name']}'>".
        "</div>".
        "<label class='col-sm-2 control-label'>Owner type</label>".
        "<div class='col-sm-2'>".
          "<input type='text' class='form-control'  name ='owner_type' value='{$row['owner_type']}'>".
        "</div>".
      "  <label class='col-sm-2 control-label'>Alias</label>".
        "<div class='col-sm-2'>".
          "<input type='text' class='form-control'  name ='alias' value='{$row['alias']}'>".
        "</div>".
      "</div>".
      "<div class='form-group'>".
        "<label class='col-sm-2 control-label'>Owner homepage</label>".
        "<div class='col-sm-10'>".
          "<input type='url' class='form-control'  name ='owner_homepage_url'value='{$row['owner_homepage_url']}'>".
        "</div>".
      "</div>".
      "<div class='form-group'>".
        "<label  for='guidance' class='col-sm-2 control-label'>Contact Information</label>".
        "<div class='col-sm-10'>".
        "<textarea class='form-control' rows='3' name='contact_information'>{$row['contact_information']}</textarea>".
        "</div>".
      "</div>".
      "<div class='form-group'>".
      "  <label  for='guidance' class='col-sm-2 control-label'>Owner Notes</label>".
        "<div class='col-sm-10'>".
      "  <textarea class='form-control' rows='6' name='owner_notes'>{$row['owner_notes']}</textarea>".
        "</div>".
      "</div>".
      "<div class='form-group'>".
        "<div class='col-sm-offset-2 col-sm-10'>".
          "<button type='submit' class='btn btn-success'>Update</button>".
        "</div>".
      "</div>".
      "</form>";
  mysqli_close($con);
  ?>
<div class='col-sm-offset-2 col-sm-10'>
    <a class="btn btn-danger" href="delete_nexb.php?nexb_key=<?php echo $key ?>" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
</div>
<br><br>
<form action='admin.php' method='post'>
<div class='form-group'>
  <input type='hidden' name='username' value ='admin'>
  <input type='hidden' name='password' value='password'>
</div>
<div class='form-group'>
  <div class='col-sm-offset-2 col-sm-10'>
  <button type='submit' class='btn btn-default'> <<< Back</button>
  </div></div></form>
</body>
</html>
