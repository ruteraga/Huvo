<?php

$page_title='Delete Products';
session_start();
    include("link.php");
    include("function.php");
// Attempt update query execution

    if($_SERVER['REQUEST_METHOD']=="POST")
    {

        $id=(int)$_GET['id'];
        $query="SELECT COUNT(id) FROM products";
        $result = mysqli_query($con,$query);
        $data=mysqli_fetch_assoc($result);
        $nbr_id=(int)$data;
        $sql = "DELETE FROM products WHERE id=$id";   
        mysqli_query($con,$sql);

            $query2="UPDATE products SET id=id-1 WHERE id>$id";
            mysqli_query($con,$query2);

        $query1="ALTER TABLE products AUTO_INCREMENT=$nbr_id";
        mysqli_query($con,$query1);
        header("Location:products.php");
    }
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
    <!-- Bootstrap core CSS -->
<link href="bootstrap-5.0.2-examples/bootstrap-5.0.2-examples/assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="bootstrap-5.0.2-examples/bootstrap-5.0.2-examples/sign-in/signin.css" rel="stylesheet">
  </head>
    <body>
        <main class="form-signin">
            <form method="post">
                <h3>Are you sure about Deleting this Product?</h3>
                <button class="w-100 btn btn-lg btn-primary"type="submit" value="Login">Delete</button>
            </form>
        </main>
        
        <?php
        // put your code here
        ?>
    </body>
</html>

