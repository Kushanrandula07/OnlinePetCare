<?php 
require('db_conn.php');
session_start();
 $email=$_SESSION['email'];
 
  $Approvalstatus= 'pending';
  $query1="SELECT * FROM pet_owners WHERE email='$email'";
  $r1= mysqli_query($conn, $query1);

  $nor1= mysqli_num_rows($r1);
    //print_r($nor1);
    if($nor1>0){
            while ($row1= mysqli_fetch_array($r1)){
                //print_r($row1);
                $Qid=$row1['Id'];
                $Qusername=$row1['username'];
                $Qemail=$row1['email'];
                $Qpassword=$row1['password'];
                $Qlocation=$row1['location'];
                $Qcontact_num=$row1['contact_num'];

            }
          }

    $selectSQL = "SELECT * FROM doctorschedule inner join doctor on doctorschedule.Doc_id = doctor.Doc_id WHERE  doctorschedule.Status='$Approvalstatus'";
    $r2= mysqli_query($conn, $selectSQL);
    if(mysqli_error($conn)){
        echo "Errror: ".mysqli_error($conn);
    }

    $nor1= mysqli_num_rows($r2);



 ?>





<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>User Profile</title>
   
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="icon3.jpg">

    

    <link rel="canonical" href=".\bootstrap-4.0.0\docs\4.0\examples\jumbotron">

    <!-- Bootstrap core CSS -->
    <link href=".\bootstrap-4.0.0\dist\css\bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
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
            <a class="nav-link inactive" href="appointment.php">Appointment</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="Viewappointment.php">View Appointment</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href=".\pet\petindex.php">My Pets</a>
          </li>
          

          <li class="nav-item active">
            <a class="nav-link" href="profiledetails.php">My Details<span class="sr-only">(current)</span></a>
          </li>

         

<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Other
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Doctors</a>
          <a class="dropdown-item" href="#">Pet Care Centers</a>
          <a class="dropdown-item" href="#">Pet Shops</a>
          <a class="dropdown-item" href="#">Pet Cemetery</a>
        </div>
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
  
  

    
    <br><br><br><br><br>

    <main role="main">


      <div class="panel panel-default">
                  <div class="panel-body">
                    
                    
                    <form class="form" role="form" method="POST" accept-charset="UTF-8">
                      <div class="panel panel-default">
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading">Appointment Information</div>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr class="filters">
                                    
                                    <th><input type="text" class="form-control" placeholder="Schedule Date" disabled></th>
                                    <!--th><input type="text" class="form-control" placeholder="Schedule Day" disabled></th>-->
                                    <th><input type="text" class="form-control" placeholder="Start Time" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="End Time" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Doctor" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Task" disabled></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                              while ($row = mysqli_fetch_assoc($r2)) {
                              ?>
                                 <tr>
                              <?php
                              $today = date("Y-m-d");
                              $date2 = $row['scheduleDate'];
                              if ($today <= $date2) {
                                echo "<td>".$row['scheduleDate']."</td>
                                <td>".$row['startTime']."</td>
                                <td>".$row['endTime']."</td>
                                <td>".$row['Doc_name']."</td>
                                <td><a name='booking' href='booking.php?Service_approve=".$Service_approve=$row['scheduleId']."'class='btn btn-primary'>Request Booking</a></td>";
                    
                              } else {
                               
                              }
                              ?>

                                     
                                  </tr>
                              <?php
                              }
                              ?>


                          </tbody>
                          </table>  
                      </div>
                      </div>
                    </form>
                  </div>
                </div>

  

    </main>



    </body>

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
  
</html>
