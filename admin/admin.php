<html>
<head>
<!-- jQuery + UI -->
 <link rel="stylesheet" type="text/css" href="../css/mystyle.css">
 <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"></link>
<!-- jQuery + UI -->
 <script type="text/javascript" src="../js/jquery.min.js"></script>
 <script type="text/javascript" src="../js/jquery-ui.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script> 
</head>
<body>
 <div class="page-header">
    <h1>Admin page <small>Allow you to insert, update, or delete any license or obligation in a database.</small></h1>
    <a class="btn btn-default" href="../index.php"> Home</a>
    <form class="navbar-form navbar-right" role="search" action="../search.php" method="post">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search"  name="name">
      </div>
      <button type="submit" class="btn btn-default">Search</button>
    </form>
  </div>
  <?php
  $login_username =  $_POST['username'];
  $login_password =  $_POST['password'];

  //check user name and password
  if ($login_username == "admin" AND $login_password =="password"){
  include 'form.php';
  }
  else{
    echo "<h3>invalid user or password </h3><br>".
    "<a class='btn btn-danger' role='button' href = '../index.php'>Back</a>";
  }
  ?>
  <footer>
  </footer>
</body>
</html>
