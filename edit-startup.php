<?php
require 'dp.php';
$message = '';

$startupID = $_GET['startupID'];
$sql = 'SELECT * FROM startup WHERE startupID=:startupID';
$statement = $connection->prepare($sql);
$statement->execute([':startupID' => $startupID]);
$person = $statement->fetch(PDO::FETCH_OBJ);

if (isset ($_POST['name']) && isset($_POST['address']) && isset($_POST['email']) && isset($_POST['contact']) && isset($_POST['startDate']) && isset($_POST['staff']) && isset($_POST['category'])) {
	
$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$startDate = $_POST['startDate'];
$staff = $_POST['staff'];
$category = $_POST['category'];

$sql = 'UPDATE startup SET name=:name, address=:address, email=:email, contact=:contact, startDate=:startDate, staff=:staff, category=:category WHERE startupID=:startupID';
$statement = $connection->prepare($sql);


if ($statement->execute([':name' => $name,':address' => $address,':contact' => $contact, ':email' => $email, ':startDate' => $startDate, ':staff' => $staff, ':category' => $category, ':startupID' => $startupID])) {
    header("Location: manage-startup.php");
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
                            Update Startup
                        </div>

                        <div class="card-body">
                         <?php if(!empty($message)): ?>
                         <div class="alert alert-success">
                         <?= $message; ?>
                        </div>
                         <?php endif; ?>
							
                               <form method="post">
							   <div class="form-group">
							   <label for="name">Company Name</label>
							   <input value="<?= $person->name; ?>" type="text" name="name" id="name" class="form-control">
							   <label for="email">Email</label>
							   <input value="<?= $person->email; ?>" type="email" name="email" id="email" class="form-control">
							   <label for="contact">Contact</label>
							   <input value="<?= $person->contact; ?>" type="tel" name="contact" id="contact" class="form-control">
							   <label for="address">Address</label>
							   <input value="<?= $person->address; ?>" type="text" name="address" id="address" class="form-control">
							   <label for="startDate">Start Date</label>
							   <input value="<?= $person->startDate; ?>" type="date" name="startDate" id="startDate" class="form-control">
							   <label for="staff">Staff</label>
							   <input value="<?= $person->staff; ?>" type="text" name="staff" id="staff" class="form-control">
							   <label for="category">Category</label>
							   <input value="<?= $person->category; ?>" type="text" name="category" id="category" class="form-control">
							   <div class="card-header">
							   <button type="submit" class="btn btn-info">Update Startup</button>
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