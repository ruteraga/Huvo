<?php
session_start();
    include("link.php");
    include("function.php");
    $Todo = new huvo();
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $username=$_POST['Username'];
        $password=$_POST['password'];
        if(!empty($username)&&!empty($password)&& !is_numeric($username))
        {
            $query="SELECT * FROM users where username='$username' limit 1";
            
            $result = mysqli_query($con,$query);
            if($result)
            {
                if($result && mysqli_num_rows($result)>0)
                {
                    $user_data=mysqli_fetch_assoc($result);
                    
                    if($user_data['password']==$password)
                    {
                        $_SESSION['user_id']=$user_data['user_id'];
                        header("Location:index.php");
                        die;
                    }
                    
                }
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
            <form action="login.php" method="post">
                <h1 class="h3 mb-3 fw-normal">Sign in</h1>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" name="Username" placeholder="enter your username"><br>   
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="enter your Password"><br>
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary"type="submit" value="Login">Log In</button>
                <a href="register.php">Register</a>
            </form>
        </main>
        
        <?php
        // put your code here
        ?>
    </body>
</html>
