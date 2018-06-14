<?php
require 'dp.php';
$message = '';

$mentorID = $_GET['mentorID'];
$sql = 'SELECT * FROM mentor WHERE mentorID=:mentorID';
$statement = $connection->prepare($sql);
$statement->execute([':mentorID' => $mentorID]);
$person = $statement->fetch(PDO::FETCH_OBJ);

if (isset ($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['contact'])) {
	
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$contact = $_POST['contact'];

$sql = 'UPDATE mentor SET fname=:fname, lname=:lname, email=:email, contact=:contact WHERE mentorID=:mentorID';
$statement = $connection->prepare($sql);


if ($statement->execute([':fname' => $fname,':lname' => $lname,':contact' => $contact, ':email' => $email, ':mentorID' => $mentorID])) {
    header("Location: manage-mentors.php");
  }

}

include('session.php');
 ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mentor Finder - Admin</title>
    <link rel="stylesheet" href="./vendor/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="./vendor/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body class="sidebar-fixed header-fixed">
<div class="page-wrapper">
    <nav class="navbar page-header">
        <a href="#" class="btn btn-link sidebar-mobile-toggle d-md-none mr-auto">
            <i class="fa fa-bars"></i>
        </a>

        <a class="navbar-brand" href="#">
            <img src="./imgs/logo.png" alt="logo">
        </a>

        <a href="#" class="btn btn-link sidebar-toggle d-md-down-none">
            <i class="fa fa-bars"></i>
        </a>

        <ul class="navbar-nav ml-auto">
 
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="./imgs/avatar-1.png" class="avatar avatar-sm" alt="logo">
                    <span class="small ml-1 d-md-down-none"><?php echo $login_session; ?></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
             
                    <div class="dropdown-header">Settings</div>

                    <a href="settings.html" class="dropdown-item">
                        <i class="fa fa-wrench"></i> Account
                    </a>

                    <a href="logout.php" class="dropdown-item">
                        <i id="logout" class="fa fa-lock"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>

    <div class="main-container">
        <div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-title"></li>

                    <li class="nav-item">
                        <a href="index.php" class="nav-link">
                            <i class="icon icon-speedometer"></i> Dashboard
                        </a>
                    </li>
					<li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-target"></i> Manage Startups <i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="create-startup.php" class="nav-link">
                                    <i class="icon icon-target"></i> Create Startup
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="manage-startup.php" class="nav-link">
                                    <i class="icon icon-target"></i> Update/Delete Startup
                                </a>
                            </li>
                        </ul>
                    </li>
					<li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-target"></i> Manage Mentors <i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="create-mentor.php" class="nav-link">
                                    <i class="icon icon-target"></i> Create Mentor
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="manage-mentors.php" class="nav-link">
                                    <i class="icon icon-target"></i> Update/Delete Mentor
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="content">
            <div class="row">
               

                
				
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-light">
                            Update Mentor
                        </div>

                        <div class="card-body">
                         <?php if(!empty($message)): ?>
                         <div class="alert alert-success">
                         <?= $message; ?>
                        </div>
                         <?php endif; ?>
							
                               <form method="post">
							   <div class="form-group">
							   <label for="fname">First Name</label>
							   <input value="<?= $person->fname; ?>" type="text" name="fname" id="fname" class="form-control">
							   <label for="lname">Last Name</label>
							   <input value="<?= $person->lname; ?>" type="text" name="lname" id="lname" class="form-control">
							   <label for="email">Email</label>
							   <input value="<?= $person->email; ?>" type="email" name="email" id="email" class="form-control">
							   <label for="contact">Contact</label>
							   <input value="<?= $person->contact; ?>" type="tel" name="contact" id="contact" class="form-control">
							   <div class="card-header">
							   <button type="submit" class="btn btn-info">Update Mentor</button>
							   </div>
							   </form>
                            </div>
                        </div>
                    </div>
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