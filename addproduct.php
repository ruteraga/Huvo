<?php
$page_title='Add Products';
session_start();
    include("link.php");
    include("function.php");
    
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $category=$_POST['category'];
        $name=$_POST['name'];
        $creation_date=$_POST['creation_date'];
        $quantity=$_POST['quantity'];
        if(!empty($category)&&!empty($name)&&!empty($creation_date)&&!empty($quantity))
        {
            $query="insert into products (category,name,creation_date,quantity) values('$category','$name','$creation_date','$quantity')";
            
            mysqli_query($con,$query);
            header("Location:products.php");
            die;
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
                <h3>Add Product</h3>
                <div class="form-floating">
                    <input type="text" class="form-control" name="category" id="floatingcategory" placeholder="enter the category"><br>   
                    <label for="floatingcategory">Category</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" name="name" id="floatingname" placeholder="enter the name"><br>   
                    <label for="floatingcategory">Name</label>
                </div>
                <div class="form-floating">
                    <input type="date" class="form-control" name="creation_date" id="floatingdate" placeholder="enter the creation_date"><br>
                    <label for="floatingdate">Date of Creation</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" name="quantity" id="floatingquantity" placeholder="enter the quantity"><br>   
                    <label for="floatingquantity">Quantity</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary"type="submit" value="Register">Add</button>
            </form>
        </main>
        
        <?php
        // put your code here
        ?>
    </body>
</html>
