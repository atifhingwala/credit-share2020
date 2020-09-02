<?php

require_once "sql_connect.php";
?>
<?php

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $id = htmlentities($_POST["id"]);
    $sql1 = "DELETE from users where user_id = $id";
    $result = $conn -> query($sql1);
    
    $_SESSION['delete'] = "User deleted successfully";

    //auto-incrementing the user_id
    $sql2 = "SELECT MAX('user_id') FROM users";
    $id= $conn -> query($sql2);
    echo('$id');
    $id= $id ->fetch_assoc();
    $sql3 = "ALTER TABLE users modify 'user_id' int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = $id";
    $b = $conn -> query($sql3);



    header('Location: users_new.php');
	  return;

}

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

  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-transaction my-5">
          <div class="card-body shadow-lg">
            <h5 class="card-title text-dark">Enter the User_ID to confirm delete</h5>
            <form method="post">
              
              <div class="form-label-group">
                <label for="id">Enter User_ID</label><br>
                <input type="number" id="id" name="id" class="form-control" placeholder="" required autofocus>
              </div><br>

              <div class="form-group">
                <input class=" mt-1 btn btn-primary" type="submit" name="submit" value="Delete">
                <a class="mt-1 ml-auto btn btn-secondary" href="index.php">Cancel</a>
              </div>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>