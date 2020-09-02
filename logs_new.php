<?php
session_start();
require_once "sql_connect.php";

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src="https://use.fontawesome.com/fefcf99aee.js"></script>
	<title>Logs</title>
	
</head>
<body>


<nav class="navbar navbar-expand-lg bg-secondary fixed-top" id="mainNav">
    <div class="container"><a class="navbar-brand js-scroll-trigger" href="index.php">Credit Share</a>
        <button class="navbar-toggler navbar-toggler-right font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu <i class="fas fa-bars"></i></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3" href="users_new.php">Users</a>
                </li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3" href="transfers_new.php">Transfer</a>
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
                    <h1 style="border: none" class="mt-5 light">Transfer History</h1>
                </div>
                
            </div>
        </div>
    </div>            
</header>

<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Logs</li>
</ol>
</nav>

<div class = "container-fluid table-responsive">
<table class="table table-striped table-dark">
  <thead >
    <tr>
      <th scope="col">Serial No.</th>
      <th scope="col">Senders User_id</th>
      <th scope="col">Recievers User_id</th>
      <th scope="col">Credits Sent</th>
    </tr>
  </thead>
  <tbody>
    <tr>

<?php

$sql= "SELECT * FROM transfers";
$result = $conn -> query($sql) or die($conn->error);
while ( $row = $result -> fetch_assoc() ) 
{
    echo("<td>");
    echo(htmlentities($row['t_id']));
    echo("</td><td>");
    echo(htmlentities($row['from_id']));
    echo("</td><td>");
    echo(htmlentities($row['to_id']));
    echo("</td><td>\n");
    echo(htmlentities($row['amount']));
    echo("</td> </tr>\n");
    
}
?>
</tbody>
</table>
</div>

</body>
</html>

