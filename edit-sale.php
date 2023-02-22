<?php

$page_title='Edit Sales';
session_start();
    include("link.php");
    include("function.php");
// Attempt update query execution
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $id=(int)$_GET['id'];
        //$category=$_POST['category'];
        //$name=$_POST['name'];
        $new_data=$_POST['new_data'];
        $answer=$_POST['column'];
        if(!empty($id)&&!empty($new_data))
        {
            if ($answer == "category") 
            {          
                $sql = "UPDATE sales SET category='$new_data' WHERE id=$id";   
                mysqli_query($con,$sql);
                header("Location:sales.php");
                die;
            }
            else if ($answer == "name") 
            {          
                $sql = "UPDATE sales SET name='$new_data' WHERE id=$id";
                mysqli_query($con,$sql);
                header("Location:sales.php");
                die;
            }
            else if ($answer == "quantity") 
            {
                //find the name of the product about to modify
                $query="SELECT * FROM sales where id='$id'";
                $result = mysqli_query($con,$query);
                $data=mysqli_fetch_assoc($result);
                $product_name=(string)$data['name'];
                //find current quantity in product
                $query1="SELECT * FROM products where name='$product_name'";
                $result1 = mysqli_query($con,$query1);
                $data1=mysqli_fetch_assoc($result1);
                $product_quantity=(int)$data1['quantity'];
                //find current sales quantity
                $query2="SELECT * FROM sales where id=$id";
                $result2 = mysqli_query($con,$query2);
                $data2=mysqli_fetch_assoc($result2);
                $sales_quantity=(int)$data2['quantity'];
                //find the quantity to add or remove from product
                $new_product_quantity=$product_quantity+($sales_quantity - $new_data);
                $sql1="UPDATE products SET quantity =$new_product_quantity WHERE name='$product_name'";
                mysqli_query($con,$sql1);
                //update the sales quantity
                $sql = "UPDATE sales SET quantity='$new_data' WHERE id=$id";   
                mysqli_query($con,$sql);
                header("Location:sales.php");
                die;
            }
            else if ($answer == "sales_date") 
            {          
                $sql = "UPDATE sales SET sales_date='$new_data' WHERE id=$id";   
                mysqli_query($con,$sql);
                header("Location:sales.php");
                die;
            }
            else 
            {
                alert("Incorrect");
            }
        }
        else 
        {
            alert("Wrong input!");
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
                <h3>Edit Sales</h3>
                <div class="form-floating">
                    <input type="text" class="form-control" name="column" id="floatingColumn" placeholder="enter the column"><br>
                    <label for="floatingColumn">Column to edit</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" name="new_data" id="floatingdata" placeholder="enter the new_data"><br>
                    <label for="floatingdata">New data</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary"type="submit" value="Login">Edit</button>
            </form>
        </main>
        
        <?php
        // put your code here
        ?>
    </body>
</html>