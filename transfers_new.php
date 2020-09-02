<?php

session_start();
require_once "sql_connect.php";
//include("databse.php");

?>

<?php

//if(isset($_POST['input_fromid']) && isset($_POST['input_toid']) && isset($_POST['input_credit']))

if($_SERVER['REQUEST_METHOD'] == "POST")
{
  $user_id1 = htmlentities($_POST["input_fromid"]);
  $sql = "SELECT * FROM users WHERE user_id = $user_id1";
  $result = $conn -> query($sql);
  //$result -> execute() ; //array(':user_id1' => $_POST['input_fromid'])
  $row = $result->fetch_assoc();
  $credit = htmlentities($row['credit']);

  if($credit < htmlentities($_POST['input_credit']))
  {
    $_SESSION['error'] = "Insuffitient balance...! Your balance is Rs.".$credit."";
    header('Location: transfers_new.php');
    return;
  }
  else
  {
    $bal = $credit - htmlentities($_POST['input_credit']);
    $sql1 = "UPDATE users SET credit = $bal where user_id = $user_id1";
    $result= $conn ->query($sql1);
    //$result -> execute(); //array(':bal' => $bal, ':user_id1' => $_POST['input_fromid'])

    $user_id2 = htmlentities($_POST["input_toid"]);
    $sql2 = "SELECT * from users where user_id = $user_id2";
    $result = $conn ->query($sql2);
    //$result -> execute(); //array('user_id2' => $_POST['input_toid'])
    $row = $result->fetch_assoc();
    $b= htmlentities($row['credit']);

    $total= $b + htmlentities($_POST['input_credit']);
    $sql3="UPDATE users SET credit = $total where user_id = $user_id2";
    $result = $conn -> query($sql3);
    //$result -> execute();  //$_POST["input_toid"]

    $f_id = htmlentities($_POST["input_fromid"]);
    $t_id = htmlentities($_POST["input_toid"]);
    $c_id = htmlentities($_POST["input_credit"]);
    $sql4 = "INSERT into transfers (from_id,to_id,amount) VALUES ($f_id,$t_id,$c_id)";
    $result = $conn ->query($sql4);
    //$result -> execute();  //array(':f_id' => $_POST['input_fromid'], ':t_id' => $_POST['input_toid'], ':c_id' => $_POST['input_credit'])

    $_SESSION['success'] = "Money transferred successfully";
			header('Location: index.php');
			return;

  }


}
/*
if($_SERVER['REQUEST_METHOD'] == "POST")
{
  echo"mil gya";
}
*/
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
	<title>transfer</title>
	
</head>
<body>
<nav class="navbar navbar-expand-lg bg-secondary fixed-top" id="mainNav">
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
    <div class="container d-flex row">
        <img class="col-sm-3 img-fluid ml-1" src="img/credit_share.png">
        <div class="col">	
            <div class="row">
                <div class="col-4">	
                    <h1 style="border: none" class="mt-5 light">Credit Transfer</h1>
                </div>
                
            </div>
        </div>
    </div>            
</header>

<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Transfers</li>
</ol>
</nav>

<body>

  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-transaction my-5">
          <div class="card-body shadow-lg">
            <h5 class="card-title text-dark">Make a Transaction</h5>
            <form method="post">
              
              <div class="form-label-group">
                <label for="input_fromid">Enter your Account ID</label><br>
                <input type="number" name="input_fromid" class="form-control" placeholder="Account ID" required autofocus>
              </div><br>

              <div class="form-label-group">
                <label for="input_toid">Enter Recievers ID</label>  
                <input type="number" name="input_toid" class="form-control" placeholder="Reciever ID" required>
              </div><br>

              <div class="form-label-group">
                <label for="input_credit">Enter Credits</label>  
                <input type="number" name="input_credit" class="form-control" placeholder="Credits" required>
              </div><br>

              <div class="form-group">
                <input class=" mt-1 btn btn-primary" type="submit" name="submit" value="Send">
                <a class="mt-1 ml-auto btn btn-secondary" href="index.php">Cancel</a>
              </div>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!--
  <div class="container">		
  <div class="row">
    <div class="col-12 col-sm-6 offset-sm-3">
      <div class="card shadow-lg  mb-5 bg-white rounded">
        <h3 class="card-header text-dark">Make a transaction</h3>
        <form method="post">  
          <div class="card-body ml-3">

            <div class="form-group">
              <label class="form-check-label" for="input_fromid">Enter your Account ID<br><br>
                <input style="width: 60%;" class=" ml-sm-0 form-check-input" id = "input_fromid" type="number" name="input_fromid" required min="0"><br>
              </label><br><br>								
            </div>
          
            <div class="form-group">
              <label class="form-check-label" for="input_toid">Enter receivers Account ID<br><br>
                <input style="width: 60%;" class="ml-sm-0 form-check-input" id = "input_toid" type="number" name="input_toid" required min="0"><br>
              </label><br><br>
            </div>
          
            <div class="form-group">
              <label class="form-check-label" for="input_credit">Enter credit<br><br>
                <input style="width: 60%;" class="ml-sm-0 form-check-input" id="input_credit" type="number" name="input_credit" required="" min="0">
              </label><br><br>
            </div>
          
            <div class="form-group">
              <input class=" mt-1 btn btn-primary" type="submit" name="submit" value="Send">
              <a class="mt-1 ml-auto btn btn-secondary" href="index.php">Cancel</a>
            </div>
          
          </div>	
        </form>
      </div>	
    </div>	
  </div>
</div>
-->

</body>
</html>