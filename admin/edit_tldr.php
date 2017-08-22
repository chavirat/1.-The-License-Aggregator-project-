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
  //pass the key
  $key =  $_GET['tldr_key'];
  //query
  $sql_tldr = "SELECT * FROM tldr_license
  WHERE tldr_key = '$key'";

  $result_sql_tldr=mysqli_query($con,$sql_tldr);
  //check query
  if(! $result_sql_tldr ) {
  		die('Could not get data from tldr_license: ' . mysql_error());
   }
   $row = mysqli_fetch_array($result_sql_tldr, MYSQL_ASSOC);
    echo
    "<form class='form-horizontal' action='update_tldr.php' method='post'>".
      "<div class='form-group'>".
      "<label  class='col-sm-2 control-label'>Tldr license key</label>".
      "<div class='col-sm-10'>".
        "<label  class='control-label' style='color:#3e8cd2;'>{$row['tldr_key']}</label>".
          "<input type='hidden' class='form-control' name ='tldr_key' value ='{$row['tldr_key']}'>".
        "</div>".
      "</div>".
      "<div class='form-group'>".
        "<label class='col-sm-2 control-label'>tldr license name</label>".
        "<div class='col-sm-10'>".
          "<input type='text' class='form-control' name ='name' value ='{$row['tldr_name']}'>".
        "</div>".
      "</div>".
      "<div class='form-group'>".
        "<label class='col-sm-2 control-label'>tldr Source URL</label>".
        "<div class='col-sm-10'>".
          "<input type='text' class='form-control' name ='url' value ='{$row['tldr_url']}'>".
        "</div>".
      "</div>".
      "<div class='form-group'>".
        "<label class='col-sm-2 control-label'>Summary</label>".
        "<div class='col-sm-10'>".
          "<textarea class='form-control' rows='3' name='summary'>{$row['summary']}</textarea>".
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
      <a class="btn btn-danger" href="delete_tldr.php?tldr_key=<?php echo $key ?>" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
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
