<?php
session_start();
require_once "sql_connect.php";
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

<body>

<nav class="navbar navbar-expand-lg bg-secondary fixed-top" id="mainNav">
    <div class="container"><a class="navbar-brand js-scroll-trigger" href="index.php">Credit Share</a>
        <button class="navbar-toggler navbar-toggler-right font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu <i class="fas fa-bars"></i></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3" href="transfers_new.php">Transfer</a>
                </li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3" href="logs_new.php">Logs</a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>

<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex row">
        <img class="col-sm-3 img-fluid ml-1" src="img/credit_share.png">
        <div class="col">	
            <div class="row">
                <div class="col-4">	
                    <h1 style="border: none" class="mt-5 light">Users</h1>
                </div>
                
            </div>
        </div>
    </div>            
</header>

<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Users</li>
</ol>
</nav>

<?php
		if ( isset($_SESSION['added']) ) {
		    echo '<bold><p class="container mt-2 ml-3"style="color:black;">'.$_SESSION['added']."</p></bold>\n";
		    unset($_SESSION['added']);
    }
    if ( isset($_SESSION['delete']) ) {
      echo '<bold><p class="container mt-2 ml-3"style="color:black;">'.$_SESSION['delete']."</p></bold>\n";
      unset($_SESSION['delete']);
    }
	    ?>

<div class = "container-fluid table-responsive">
<table class="table table-striped table-dark">
  <thead >
    <tr>
      <th scope="col">Name</th>
      <th scope="col">User_ID</th>
      <th scope="col">Credit</th>
    </tr>
  </thead>
  <tbody >
    <tr>
      <!--<td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
-->

<?php

$sql= "SELECT * FROM users";
$result = $conn -> query($sql) or die($conn->error);
while ( $row = $result -> fetch_assoc() ) 
{
    echo("<td>");
    echo(htmlentities($row['names']));
    echo("</td><td>");
    echo(htmlentities($row['user_id']));
    echo("</td><td>");
    echo(htmlentities($row['credit']));
    echo("</td> </tr>\n");
    
}
?>
</tbody>
</table>
<a href="add_user.php"><button class=" button_user btn-md btn btn-dark mb-3" type="button" name="button">Add User</button></a>
<a href="delete_user.php"><button class=" button_user btn btn-md btn-dark mb-3" type="button" name="button">Delete User</button></a>
</div>

</body>
</html>


