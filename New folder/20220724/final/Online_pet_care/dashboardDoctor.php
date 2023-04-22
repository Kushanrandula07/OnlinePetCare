<?php
session_start();
require('db_conn.php');
// include_once 'connection/server.php';
//if(!isset($_SESSION['petownerSession']))
//{
//}
$username = $_SESSION['username'];
//$res=mysqli_query($conn,"SELECT * FROM users WHERE ID=".$username);
//$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

   
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href=".\image\icon3.jpg">

    <title>Doctor</title>

    <link rel="canonical" href=".\bootstrap-4.0.0\docs\4.0\examples\jumbotron">

    <!-- Bootstrap core CSS -->
    <link href=".\bootstrap-4.0.0\dist\css\bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href=".\bootstrap-4.0.0\docs\4.0\examples\jumbotron" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link inactive" href="dashboardDoctor.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="profiledetails.php">My Details</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" href="Pending_appointment.php">Pending Appointment</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" href="doctorschedule.php">Doctor Schedule</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" href="AcceptPets.php">Accpet Patients</a>
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

 <main role="main">

      
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">Hello,<?php echo $username  ?> </h1>
          <p>Welcome to Online Pet Care This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
          <p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
        </div>
      </div>

      <div class="container">
        
        <div class="row">
          <div class="col-md-4">
            <h2>Appointment</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn btn-secondary" href="Pending_appointment.php" role="button">View Pending Appointment &raquo;</a></p>
          </div>
          <div class="col-md-4">
            <h2>My Schedule</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn btn-secondary" href="doctorschedule.php" role="button">Add Schedule today &raquo;</a></p>
          </div>
          <div class="col-md-4">
            <h2>My Details</h2>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <p><a class="btn btn-secondary" href="profiledetails.php" role="button">My Details &raquo;</a></p>
          </div>
        </div>

        <hr>

      </div> <!-- /container -->


      
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
