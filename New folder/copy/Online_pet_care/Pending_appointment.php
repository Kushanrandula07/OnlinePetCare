<?php
session_start();
require('db_conn.php');


$email = $_SESSION['email'];
$Approvalstatus = 'pending';


$selectSQL = "SELECT * FROM appointment INNER JOIN doctorschedule ON doctorschedule.scheduleId = appointment.scheduleID INNER JOIN pet_owners ON pet_owners.Id = appointment.Id WHERE doctorschedule.Doc_email='$email' AND appointment.Status='$Approvalstatus'";
$r1 = mysqli_query($conn, $selectSQL);
if (mysqli_error($conn)) {
  echo "Errror: " . mysqli_error($conn);
}
$status2 = "Accepted";
$status3 = "Rejected";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">


  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="icon3.jpg">

  <title>Pending Appointment</title>

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
          </li>
        </ul>
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
          <th><input type="text" class="form-control" placeholder="Comment" disabled></th>
          <th><input type="text" class="form-control" placeholder="Task" disabled></th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($r1)) {
        ?>
          <tr>
            <td><?php echo $row['scheduleDate'] ?></td>
            <td><?php echo $row['Petname'] ?></td>
            <td><?php echo $row['app_symptm'] ?></td>
            <td><?php echo $row['comment'] ?></td>

            <td><a href="Pending_appointment.php?Service_approve=<?php echo $Service_approve = $row['scheduleId'] ?>&email=<?php echo $email2 = $row['email'] ?>" Action="$status2" class="btn btn-primary">Accept</a>
              <a href="Pending_appointment.php?Service_reject=<?php echo $Service_reject = $row['scheduleId'] ?>&email=<?php echo $email1 = $row['email'] ?>" Action="$status3" class="btn btn-primary">Reject</a>

            </td>


          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>

  </main>

  <?php
  
  use PHPMailer\PHPMailer\PHPMailer;
  
  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php'; 

  $status = '';
  if (isset($_GET['Service_approve'])) {
    $Approval_id = $_GET['Service_approve'];


  
    $status2 = "Accepted";

    $query2 = "UPDATE appointment SET Status='$status2' WHERE scheduleId ='$Approval_id'";


   $r2 = mysqli_query($conn, $query2);
    // Send mail if db update success
    if ($r2==true) {
      sendMail(true);
    }

    $page;
  } elseif (isset($_GET['Service_reject'])) {
    $Approval_id = $_GET['Service_reject'];

    $status3 = "Rejected";
    $query3 = "UPDATE appointment SET Status='$status3' WHERE scheduleId ='$Approval_id'";


    $r3 = mysqli_query($conn, $query3);
    if ($r3 == true) {
      sendMail(false);
    }

    $page;
  } else {
    echo "";
  }



  function sendMail($email)
  {


    $sender_name = "smtp tester";
    $sender_email = "noreply@mailer.org";
    //
    $username = "e1841116@bit.mrt.ac.lk";
    $password = "Kushan1995*";
    //
    $msg = "";
    $subject = "";
    if ($email) {
      // come here when doctor accepted
      $msg = "doctor is request accepted";
      $subject = "Clinic Appoiment- Accepted";
    } else {
      // else
      $msg = "doctor is request Reject";
      $subject = "Clinic Appoiment- Rejected";
    }


    $mail = new PHPMailer(true);
    $mail->isSMTP();
    //$mail->SMTPDebug = 2;
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;

    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom($sender_email, $sender_name);
    $mail->Username = $username;
    $mail->Password = $password;

    $mail->Subject = $subject;
    $mail->msgHTML($msg);
    $mail->addAddress(trim($_GET['email']));
    if (!$mail->send()) {
      $error = "Mailer Error: " . $mail->ErrorInfo;
    } else {
    }
  }


  // header('location: doctorschedule.php');
  ?>




</body>

<footer class="container">
  <p>&copy; Kushan 2022</p>
</footer>

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>
  window.jQuery || document.write('<script src=".\bootstrap-4.0.0\assets\js\vendor\popper.min.js><\/script>')
</script>
<script src=".\bootstrap-4.0.0\assets\js\vendor\popper.min.js"></script>
<script src=".\bootstrap-4.0.0\dist\js\bootstrap.min.js"></script>

</html>