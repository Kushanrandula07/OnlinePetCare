<?php 
require('db_conn.php');
session_start();
 $username=$_SESSION['username'];
$stat='Accept';
  $query1="SELECT * FROM users WHERE username='$username'";
  $r1= mysqli_query($conn, $query1);

  $nor1= mysqli_num_rows($r1);

    if($nor1>0){
            while ($row1= mysqli_fetch_array($r1)){
                //print_r($row1);
                $Qid=$row1['id'];
                $Qusername=$row1['username'];
                $Qemail=$row1['email'];
                $Qpassword=$row1['password'];
                $Qdatetime=$row1['create_datetime'];
                $Qlocation=$row1['location'];
                $Qcontact_num=$row1['contact_num'];

$_SESSION['email']=$Qemail;
            }
          }
 ?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>View pet cemetry</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href=".\image\icon3.jpg">
    <link rel="canonical" href=".\bootstrap-4.0.0\docs\4.0\examples\jumbotron">
    <link href=".\bootstrap-4.0.0\dist\css\bootstrap.min.css" rel="stylesheet">
    <link href="jumbotron.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">

          <li class="nav-item active">
            <a class="nav-link" href="dashboard.php">Home <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" href="appointment.php">Appointment</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" href=".\pet\petindex.php">My Pets</a>
          </li>
          

          <li class="nav-item active">
            <a class="nav-link" href="profiledetails.php">My Details</span></a>
          </li>
          
          <li class="nav-item active">
            <a class="nav-link" href="Addpetcemetry.php">Add Pet Cemetry</span></a>
          </li>

          </ul>      
      <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>

          <ul class="navbar-nav mr-auto">

          <li class="nav-item">
            <a class="nav-link active" href="logout.php">Logout</a>
          </li></ul>
        </form>
      </div>
    </nav>

   <br>
   <br>
    <main role="main">

      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
          <?php
              //$vid=$_GET['viewid'];
              
              $ret=mysqli_query($conn,"select * from petcemetry WHERE Status ='$stat'");
              $cnt=1;
              while ($row=mysqli_fetch_array($ret)) {

              ?>

            <div class="col-md-4">
              <div class="card mb-4 box-shadow">

                <img class="card-img-top" src="./pet/profilepics/<?php  echo $row['PetImage'];?>" width="200" height="200" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">Name :<?php  echo $row['PetName'];?></p>
                  <p class="card-text">Owner Name :<?php  echo $row['UserName'];?></p>
                  <p class="card-text">Death Date :<?php  echo $row['DeathDate'];?></p>
                  <p class="card-text">Funeral Place :<?php  echo $row['FuneralPlace'];?></p>
                  
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div> 
            <?php
          }
            ?>   
        </div>
      </div>
    </div>
    </main>
      
      

    
    <footer class="container">
      <p>&copy; Kushan 2021</p>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
     <script src=".\bootstrap-4.0.0\assets\js\vendor\popper.min.js"></script>
    <script src=".\bootstrap-4.0.0\dist\js\bootstrap.min.js"></script>
  </body>
</html>