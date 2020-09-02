<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Credit Share</title>
        <!-- Font Awesome icons (free version)-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet">
        <!-- Fonts CSS-->
        <link rel="stylesheet" href="css/heading.css">
        <link rel="stylesheet" href="css/body.css">
    </head>
    <body id="page-top">
        <nav class="navbar navbar-expand-sm bg-secondary fixed-top" id="mainNav">
            <div class="container"><a class="navbar-brand js-scroll-trigger" href="index.php">Credit Share</a>
                <button class="navbar-toggler navbar-toggler-right font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu <i class="fas fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3" href="users_new.php">Users</a>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3" href="logs_new.php">Logs</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
        
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                 <img class="masthead-avatar mb-5" src="img/credit_share.png" alt="">
                <!-- Masthead Heading-->
                <!--<h1 class="masthead-heading mb-0">Welcome To Credit Share</h1>-->
                <div class="col">		
					<h1 class="col col-sm mt-5 ">Welcome To Credit Share</h1>
					
			    </div>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
        </header>
        <?php
		if ( isset($_SESSION['success']) ) {
		    echo '<p class="container mt-5"style="color:black;">'.$_SESSION['success']."</p>\n";
		    unset($_SESSION['success']);
		}
		if ( isset($_SESSION['error']) ) {
		    echo '<p class="container mt-5"style="color:black;">'.$_SESSION['error']."</p>\n";
		    unset($_SESSION['error']);
		}
	    ?>
        
        <div class="container">    
            <div class="card-body">
                <dl class="row">
                    <div class="col-xs-12 col-sm-6 mb-1 px-1"><a class= "btn btn-secondary btn-lg btn-block "href="users_new.php">View Users</a></div>
                    <div class="col-xs-12 col-sm-6 my-sm-12 px-1 "><a class="btn btn-secondary btn-lg btn-block " href="transfers_new.php">Send money</a></div>
                </dl>
            </div>
        </div>