<?php
session_start();
require('db_conn.php');

$email = $_SESSION['email'];
$Approvalstatus= 'Accepted';


$selectSQL = "SELECT * FROM appointment INNER JOIN doctorschedule ON doctorschedule.scheduleId = appointment.scheduleID WHERE doctorschedule.Doc_email='$email' AND appointment.Status='$Approvalstatus'";
    $r1= mysqli_query($conn, $selectSQL);
    if(mysqli_error($conn)){
        echo "Errror: ".mysqli_error($conn);
    }

?>






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

   
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="icon3.jpg">

    <title>Accepted Appointment</title>

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
          <li class="nav-item active">
            <a class="nav-link" href="dashboardDoctor.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="profiledetails.php">My Details</a>
          </li>

          <li class="nav-item">
            <a class="nav-link inactive" href="Pending_appointment.php">Pending Appointment</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" href="doctorschedule.php">Doctor Schedule</a>
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

        <hr>

      </div> <!-- /container -->

                                <!-- Table -->
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr class="filters">
                                    
                                    <th><input type="text" class="form-control" placeholder="scheduleDate" disabled></th>
                                    
                                    <th><input type="text" class="form-control" placeholder="Pet Name" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Symptom" disabled></th>
                                    
                                    <th><input type="text" class="form-control" placeholder="Channeling Done" disabled></th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php  
                              while ($row = mysqli_fetch_assoc($r1)) {
                              ?>
                                 <tr>
                                      <td><?php echo $row['scheduleDate']?></td>
                                      
                                  
                                      <td><?php echo $row['Petname']?></td>
                                      <td><?php echo $row['app_symptm']?></td>
                                      
                                      
                                      <td><a href="Addprescription.php?Service_approve=<?php echo $Service_approve=$row['app_ID']?>" Action = "$status2" class="btn btn-primary">Yes</a>
                                        <a href="AcceptPets.php?Service_reject=<?php echo $Service_reject=$row['app_ID']?>" Action = "$status3" class="btn btn-primary">No</a>

                                      </td>

                                      
                                  </tr>
                              <?php
                          
                              }
                              ?>
  </tbody>
   </table>   

    </main>

    <?php
    if (isset($_GET['Service_reject'])) {
         $Approval_id = $_GET['Service_reject'];
         
         $status3="Customer not attend";

         $query3="UPDATE appointment SET Status='$status3' WHERE app_ID ='$Approval_id'";


        $r3= mysqli_query($conn, $query3);
        if(mysqli_error($conn)){
          echo "Errror: ".mysqli_error($conn);
        }
        header("Location:AcceptPets.php");
        
       
    
    } else if(isset($_GET['Service_approve'])){
        $Approval_id = $_GET['Service_approve'];

        $status3="complted";

        $query3="UPDATE appointment SET Status='$status3' WHERE app_ID ='$Approval_id'";


        $r3= mysqli_query($conn, $query3);
        if(mysqli_error($conn)){
          echo "Errror: ".mysqli_error($conn);
        }
        header("Location:AcceptPets.php");
    }

    ?>




    </body>

    <footer class="container">
      <p>&copy; Kushan 2022</p>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src=".\bootstrap-4.0.0\assets\js\vendor\popper.min.js><\/script>')</script>
    <script src=".\bootstrap-4.0.0\assets\js\vendor\popper.min.js"></script>
    <script src=".\bootstrap-4.0.0\dist\js\bootstrap.min.js"></script>
  
</html>
