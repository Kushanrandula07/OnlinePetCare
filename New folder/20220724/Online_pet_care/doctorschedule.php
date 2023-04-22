<?php
session_start();
require('db_conn.php');

$username = $_SESSION['username'];
$Approvalstatus= 'pending';


$selectSQL = "SELECT * FROM doctorschedule WHERE Doc_name='$username' AND Status='$Approvalstatus'";
    $r1= mysqli_query($conn, $selectSQL);
    if(mysqli_error($conn)){
        echo "Errror: ".mysqli_error($conn);
    }

    $nor1= mysqli_num_rows($r1);

$selectSQL5 = "SELECT * FROM doctor WHERE Doc_name='$username'";
    $r5= mysqli_query($conn, $selectSQL5);
    if(mysqli_error($conn)){
        echo "Errror: ".mysqli_error($conn);
    }

    $nor5= mysqli_num_rows($r5);

        if($nor5>0){
            while ($row1= mysqli_fetch_array($r5)){
                //print_r($row1);
                $Doc_id=$row1['Doc_id'];
                $Doc_name=$row1['Doc_name'];
                $Doc_email=$row1['Doc_email'];
                $Jobtitle=$row1['Jobtitle'];
                $Contact_num=$row1['Contact_num'];
                $Password=$row1['Password'];
                $Working_days=$row1['Working_days'];
                $working_hours=$row1['working_hours'];
                $PetCareCenter=$row1['PetCareCenter'];

            }
          }

?>
<?php
if (isset($_POST['submit'])) {
$date = stripslashes($_REQUEST['date']);
$scheduleday = stripslashes($_REQUEST['scheduleday']);
$starttime = stripslashes($_REQUEST['starttime']);
$endtime = stripslashes($_REQUEST['endtime']);
$bookavail = stripslashes($_REQUEST['bookavail']);

$status = 'pending';

$query    = "INSERT into `doctorschedule` (scheduleDate,scheduleDay,startTime, endTime,bookAvail,Doc_id,Doc_name,PetCareCenter,Status)VALUES ('$date','$scheduleday', '$starttime', '$endtime','$bookavail', '$Doc_id', '$username', '$PetCareCenter','$status')";
    $result   = mysqli_query($conn, $query);
header("Location:doctorschedule.php");
}
?>

<?php
$page = $_SERVER['PHP_SELF'];
$sec = "10";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

   <!--<meta http-equiv="refresh" content="<'">-->
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


  <script>

        $( function() {
            $( "#datepicker1" ).datepicker({dateFormat: 'dd/mm/yy'});
        local =  ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday' ];
            
            $('#datepicker1').datepicker()
            .on("change", function () {    
              var today = new Date($('#datepicker1').datepicker('getDate'));      
              //alert(local[today.getDay()]);
              $('#day').val(local[today.getDay()]);
        });

        });
</script>

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
            <a class="nav-link active" href="Pending_appointment.php">Pending Appointment</a>
          </li>

          <li class="nav-item">
            <a class="nav-link inactive" href="#">Doctor Schedule</a>
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

      <div id="wrapper">

            <div id="page-wrapper">
                <div class="container-fluid">
                    
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="page-header">
                            Add Schedule
                            </h2>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-calendar"></i> Add Schedule
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- Page Heading end-->

                    <!-- panel start -->
                    <div class="panel panel-primary">

                       
                    <div class="panel-body">
                        <!-- panel content start -->
                            <div class="bootstrap-iso">
                             <div class="container-fluid">
                              <div class="row">
                               <div class="col-md-12 col-sm-12 col-xs-12">
                                <form class="form-horizontal" method="post">
                                 <div class="form-group form-group-lg">
                                  <label class="control-label col-sm-2 requiredField" for="date">
                                   Date
                                   <span class="asteriskField">
                                    *
                                   </span>
                                  </label>
                                  <div class="col-sm-10">
                                   <div class="input-group">
                                    <div class="input-group-addon">
                                     <i class="fa fa-calendar">
                                     </i>
                                    </div>
                                   <input class="form-control" id="datepicker1" name="scheduleDate" type="date" required/> 
                                   
                                  </div>
                                  </div>
                                 </div>

                                 <div class="form-group form-group-lg">
                                  <label class="control-label col-sm-2 requiredField" for="scheduleday">
                                   Day
                                   <span class="asteriskField">
                                    *
                                   </span>
                                  </label>
                                  <div class="col-sm-10">
                                  
                                   <Input type="text" class="select form-control" id="day" name="scheduleday" readonly> 
                                    
                                   
                                  </div>
                                 </div>
                                 
                                 <div class="form-group form-group-lg">
                                  <label class="control-label col-sm-2 requiredField" for="starttime">
                                   Start Time
                                   <span class="asteriskField">
                                    *
                                   </span>
                                  </label>

                                  <div class="col-sm-10">
                                   <div class="input-group clockpicker"  data-align="top" data-autoclose="true">
                                    <div class="input-group-addon">
                                     <i class="fa fa-clock-o">
                                     </i>
                                    </div>
                                    <input type="time" class="form-control" id="starttime" name="starttime" required/>
                                   </div>
                                  </div>
                                 </div>
                                 <div class="form-group form-group-lg">
                                  <label class="control-label col-sm-2 requiredField" for="endtime">
                                   End Time
                                   <span class="asteriskField">
                                    *
                                   </span>
                                  </label>
                                  <div class="col-sm-10">
                                   <div class="input-group clockpicker"  data-align="top" data-autoclose="true">
                                    <div class="input-group-addon">
                                     <i class="fa fa-clock-o">
                                     </i>
                                    </div>
                                    <input type="time" class="form-control" id="endtime" name="endtime" required/>
                                    
                                   </div>
                                  </div>
                                 </div>
                                 <div class="form-group form-group-lg">
                                  <label class="control-label col-sm-2 requiredField" for="bookavail">
                                   Availabilty
                                   <span class="asteriskField">
                                    *
                                   </span>
                                  </label>
                                  <div class="col-sm-10">
                                   <select class="select form-control" id="bookavail" name="bookavail" required>
                                    <option value="available">
                                     available
                                    </option>
                                    <option value="notavail">
                                     notavail
                                    </option>
                                   </select>
                                  </div>
                                 </div>
                                 <div class="form-group">
                                  <div class="col-sm-10 col-sm-offset-2">
                                   <button class="btn btn-primary " name="submit" type="submit">
                                    Submit
                                   </button>
                                  </div>
                                 </div>
                                </form>
                               </div>
                              </div>
                             </div>
                            </div>
                        <!-- panel content end -->
                        <!-- panel end -->
                        </div>
                    </div>
           


                </div>
            </div>



        <hr>

      </div> <!-- /container -->

    </main>
<?php
    if (isset($_GET['Service_approve'])) {
         $Approval_id = $_GET['Service_approve'];
         //echo "$Approval_id";
         $status="Completed";
         $query2="UPDATE doctorschedule SET Status='$status' WHERE scheduleId ='$Approval_id'";
        $r2= mysqli_query($conn, $query2);
        //if($r2==1)
        //{
          $page;
        //}
    }else{
      echo "";
    }
    //header('location: doctorschedule.php');
    ?>
  
  </body>
  <footer class="container">
      <p>&copy; Kushan 2021</p>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src=".\bootstrap-4.0.0\assets\js\vendor\popper.min.js><\/script>')</script>
    <script src=".\bootstrap-4.0.0\assets\js\vendor\popper.min.js"></script>
    <script src=".\bootstrap-4.0.0\dist\js\bootstrap.min.js"></script>
</html>