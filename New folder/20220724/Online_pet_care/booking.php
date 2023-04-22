<?php 
require('db_conn.php');
session_start();
 $username=$_SESSION['username'];
 $Qemail=$_SESSION['email'];
 $Approval_id = $_GET['Service_approve'];
  $Approvalstatus= 'pending';
  $query1="SELECT * FROM pet_owners WHERE username='$username'";
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

$selectSQL6 = "SELECT * FROM pets WHERE OwnerName='$username'";
    $r6= mysqli_query($conn, $selectSQL6);
    if(mysqli_error($conn)){
        echo "Errror: ".mysqli_error($conn);
    }

    $nor6= mysqli_num_rows($r6);

 ?>





<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>User Profile</title>
   
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href=".\image\icon3.jpg">

    

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
            <a class="nav-link" href="dashboard.php">My Profile <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link inactive" href="#">Appointment</a>
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
                        <div class="panel-heading">Patient Information</div>
                        <div class="panel-body">
                          
                          Pet Owner Name: <?php echo $Qusername ?> <br>
                          Pet Owner Email: <?php echo $Qemail ?><br>
                          Contact Number: <?php echo $Qcontact_num ?><br>
                          Location: <?php echo $Qlocation ?>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading">Appointment Information</div>
 
                      </div>
                      <div>
                      <label for="petname">Pet Name</label>
                      <select name="selectpetname">
                        <?php
                          while ($row=mysqli_fetch_array($r6)) {
                        ?>
                        <option id="<?php echo $row['PetID'];?>"><?php echo $row['PetName'];?></option>
                        <?php
                        }
                        ?>
                        
                      </select>
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="control-label">Symptom:</label>
                        <input type="text" class="form-control" name="symptom" required>
                      </div>
                      <div class="form-group">
                        <label for="message-text" class="control-label">Comment:</label>
                        <textarea class="form-control" name="comment" required></textarea>
                      </div>
                      <div class="form-group">
                        <input type="submit" name="appointment" id="submit" class="btn btn-primary" value="Make Appointment">
                      </div>
                    </form>
                  </div>

                  <?php

  if(isset($_POST['appointment']))
  {
  $selectSQL5 = "SELECT * FROM doctorschedule WHERE scheduleId='$Approval_id'";
    $r5= mysqli_query($conn, $selectSQL5);
    if(mysqli_error($conn)){
        echo "Errror: ".mysqli_error($conn);
    }

    $nor5= mysqli_num_rows($r5);

        if($nor5>0){
            while ($row1= mysqli_fetch_array($r5)){
                //print_r($row1);
                $scheduleId=$row1['scheduleId'];
                $scheduleDate=$row1['scheduleDate'];
                $scheduleDay=$row1['scheduleDay'];
                $startTime=$row1['startTime'];
                $endTime=$row1['endTime'];
                $bookAvail=$row1['bookAvail'];
                $Doc_id=$row1['Doc_id'];
                $Doc_name=$row1['Doc_name'];
                $PetCareCenter=$row1['PetCareCenter'];
                $Status=$row1['Status'];
            }
          }
                      //getting the post values
                      $selectpetname = stripslashes($_REQUEST['selectpetname']);
                      $symptom = stripslashes($_REQUEST['symptom']);
                      $comment = stripslashes($_REQUEST['comment']);
                      $create_datetime = date("Y-m-d H:i:s");
                      
                        $newstatus='pending';
                        $query=mysqli_query($conn, "insert into appointment(Id,petowner,Doc_id,scheduleID,PetCareCenter,Petname,app_symptm,comment,status,timestamp) value('$Qid','$Qusername','$Doc_id', '$Approval_id', '$PetCareCenter', '$selectpetname', '$symptom','$comment','$newstatus','$create_datetime' )");

                        if ($query) {
                        echo "<script>alert('You have successfully request appointment');</script>";
                       echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
                        } else{
                        echo "<script>alert('Something Went Wrong. Please try again');</script>";
                        }
                            if(mysqli_error($conn)){
        echo "Errror: ".mysqli_error($conn);
    }
    }

    ?>





                </div>

  

    </main>
<?php

?>
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
