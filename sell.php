<?php

$page_title='Sell Products';
session_start();
    include("link.php");
    include("function.php");
if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $id=(int)$_GET['id'];
        $quantity1=$_POST['quantity1'];
        if(!empty($id)&&!empty($quantity1))
        {
            $query="SELECT * FROM products where id='$id'";
            $result = mysqli_query($con,$query);
            if($result)
            {
                $data=mysqli_fetch_assoc($result);
                if($data['quantity']>$quantity1)
                {
                    $new_data=$data['quantity']-$quantity1;
                    $category=$data['category'];
                    $sales_date=date("Y-m-d H:i:s"); 
                    $name=$data['name'];
                    $sql = "UPDATE products SET quantity='$new_data' WHERE id=$id"; 
                    mysqli_query($con,$sql);
                    $sql1 = "insert into sales (id,category,name,sales_date,quantity) values('','$category','$name','$sales_date','$quantity1')"; 
                    mysqli_query($con,$sql1);
                    header("Location:products.php");
                    die;
                }  
                else
                {
                    header("Location:products.php");
                }
            }
        else 
        {
            alert("Wrong input!");
        }

    }
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
    <body class ="text-center">
        <main class="form-signin">
            <form method="post">
                <h3>Sell Product</h3>
                <div class="form-floating">
                    <input type="text" class="form-control" name="quantity1" id="floatingquantity" placeholder="enter the quantity"><br>   
                    <label for="floatingquantity">Quantity to sell:</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary"type="submit" value="Register">Sell</button>
            </form>
        </main>
        
        <?php
        // put your code here
        ?>
    </body>
</html>
