<?php
session_start();
    include("link.php");
    include("function.php");
        $Todo = new huvo();
        $user_data= $Todo->check_login($con);
?>
<html>
  <head>
    <title>Huvo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
  </head>
<?php include_once('layout.php'); ?>
<div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white" style="width: 75%; max-height:100%; overflow-y:auto;">
  <h1 class="text-center" style="line-height:6;">Welcome to your Inventory Management System</h1>
</div>

    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
    <script src="./js/app.js"></script>
</html>
