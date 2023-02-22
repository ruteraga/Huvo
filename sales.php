<?php

$page_title='Sell Products';
session_start();
    include("link.php");
    include("function.php");
    $Todo = new huvo();
    $user_data= $Todo->check_login($con);

?>
<?php
$db= $con;
$tableName="sales";
$columns= ['id','category','name','sales_date', 'quantity'];
$fetchData = fetch_data($db, $tableName, $columns);

function fetch_data($db, $tableName, $columns){
 if(empty($db)){
  $msg= "Database connection error";
 }elseif (empty($columns) || !is_array($columns)) {
  $msg="columns Name must be defined in an indexed array";
 }elseif(empty($tableName)){
   $msg= "Table Name is empty";
}else{

$columnName = implode(", ", $columns);
$query = "SELECT ".$columnName." FROM $tableName"." ";
$result = $db->query($query);

if($result== true){ 
 if ($result->num_rows > 0) {
    $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
    $msg= $row;
 } else {
    $msg= "No Data Found"; 
 }
}else{
  $msg= mysqli_error($db);
}
}
return $msg;
}
?>

<html>
  <head>
    <title>Sales</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
  </head>
<?php include_once('layout.php'); ?>
<div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white" style="width: 75%; max-height:100%; overflow-y:auto;">
<div class="container py-5">
  <h3>Sales</h3>
 <div class="row">
   <table id="example" class="table table-striped" style="width:100%">
      <thead>
        <th>ID</th>
        <th>Category</th>
        <th>Name</th>
        <th>Sales_date</th>
        <th>Quantity</th>
        <th>Actions</th>
      </thead>
         
    <tbody>
  <?php
      if(is_array($fetchData)){      
      $sn=1;
      foreach($fetchData as $data){
    ?>
      <tr>
      <td><?php echo $data['id']??''; ?></td>
      <td><?php echo $data['category']??''; ?></td>
      <td><?php echo $data['name']??''; ?></td>
      <td><?php echo $data['sales_date']??''; ?></td>
      <td><?php echo $data['quantity']??''; ?></td> 
      <td>
        <div class ="btn-group">
        <a href="edit-sale.php?id=<?php echo(int)$data['id'];?>" class="">Edit</a>
        </div>
        <div class ="btn-group">
        <a href="delete-sales.php?id=<?php echo(int)$data['id'];?>" class="">Delete</a>
        </div>
      </td>
     </tr>
     <?php
      $sn++;}}else{ ?>
      <tr>
        <td colspan="8">
    <?php echo $fetchData; ?>
  </td>
    <tr>
    <?php
    }?>
    </tbody>
     </table>
   </div>
</div>
</div>
</div>
</div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
    <script src="./js/app.js"></script>
</html>
