<?php
session_start();   
if(isset($_POST['submit']))
 {
   $username=$_POST['username'];
   $password=$_POST['password'];

   $conn=mysqli_connect("localhost","root","","mentorfinder");
   $result=mysqli_query($conn,"SELECT * FROM `user` WHERE `username`='$username' && `password`='$password'");
   $count=mysqli_num_rows($result);
   if($count==1){
	   $_SESSION['login_user']=$username;
	   echo "Login Success";
	   header("location:index.php");
   }
   else{
	   echo "Invalid Info";
   }
 }
   
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mentor Finder - Login</title>
    <link rel="stylesheet" href="./vendor/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="./vendor/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
<div class="page-wrapper flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-4">
                    <div class="card-header text-center text-uppercase h4 font-weight-light">
                        Login
                    </div>
                    <form method = "POST" action = "">
                    <div class="card-body py-5">
					
                        <div class="form-group">
                            <label class="form-control-label">Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6">
                                <button id="submit" name="submit" type="submit" class="btn btn-primary px-5">Login</button>
                            </div>

                            <div class="col-6">
                                <a href="#" class="btn btn-link">Forgot password?</a>
                            </div>
                        </div>
                    </div>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="./vendor/jquery/jquery.min.js"></script>
<script src="./vendor/popper.js/popper.min.js"></script>
<script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="./vendor/chart.js/chart.min.js"></script>
<script src="./js/carbon.js"></script>
<script src="./js/demo.js"></script>
</body>
</html>
