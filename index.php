<html>
<head>
<!-- jQuery + UI -->
 <link rel="stylesheet" type="text/css" href="css/mystyle.css">
 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"></link>
<!-- jQuery + UI -->
 <script type="text/javascript" src="js/jquery.min.js"></script>
 <script type="text/javascript" src="js/jquery-ui.min.js"></script>
 <script type="text/javascript" src="../js/bootstrap.min.js"></script> 
</head>
<body>
<!-- header-->
  <div class="page-header">
     <h1>License Aggregator Project </h1>
     <a class="btn btn-default" href="index.php"> Home</a>
     <a class="btn btn-default" href="License Aggretator Project.docx">Documentation</a>
     <form class="navbar-form navbar-right" role="search" action="search.php" method="post">
       <div class="form-group">
         <input type="text" class="form-control" placeholder="Search"  name="name">
       </div>
       <button type="submit" class="btn btn-default">Search</button>
     </form>
   </div>
<!-- admin page-->
<form class="navbar-form navbar-right" action="admin/admin.php" method="post">
  <input type="text" class="form-control" placeholder="username" name="username">
  <input type="password" class="form-control" placeholder="password" name="password">
  <button type="submit" class="btn btn-default">Login</button>
</form>
<!-- license list from match license table-->
<?php
 include 'license_list.php';
?>
<br>
<footer>
Developed by Chavirat Burapadecha <br>
email : <a href="mailto:chavirat.burapadecha@roguewave.com?Subject=License_aggregator_problem" target="_top">chavirat.burapadecha@roguewave.com</a>
</footer>
</body>
</html>
