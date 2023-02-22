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
            $user_id =$Todo->random_num(100);
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number    = preg_match('@[0-9]@', $password);
            $specialChars = preg_match('@[^\w]@', $password);
            
            if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) 
            {
                alert("Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character."); 
            }
            else
            {
                $query="insert into users (user_id,username,password) values('$user_id','$username','$password')";
                mysqli_query($con,$query);
                header("Location:login.php");
            die;
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
        <form action="register.php" method="post">
                <h1 class="h3 mb-3 fw-normal">Register</h1>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" name="Username" placeholder="enter your username"><br>   
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="enter your Password"><br>
                    <label for="floatingPassword">Password</label>
                </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" value="Register">Register</button>
            <a href="login.php">Login</a>
        </form>
    </main>
    </body>
</html>
