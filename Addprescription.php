<?php
session_start();
date_default_timezone_set("Asia/colombo");
require('db_conn.php');

$email = $_SESSION['email'];
$Approvalstatus = 'Accepted';
$Approval_id = $_GET['Service_approve'];

$selectSQL = "SELECT * FROM appointment inner join pet_owners on appointment.Id = pet_owners.Id WHERE  appointment.app_ID='$Approval_id'";
$r1 = mysqli_query($conn, $selectSQL);
if (mysqli_error($conn)) {
  echo "Errror: " . mysqli_error($conn);
}


$nor1 = mysqli_num_rows($r1);

if ($nor1 > 0) {
  while ($row1 = mysqli_fetch_array($r1)) {
    //print_r($row1);
    $Qapp_ID = $row1['app_ID'];
    $QId = $row1['Id'];
    $QDoc_id = $row1['Doc_id'];
    $QscheduleID = $row1['scheduleID'];
    $Qlocation = $row1['location'];
    $QPetID = $row1['PetID'];
    $QPetname = $row1['Petname'];
    $Qapp_symptm = $row1['app_symptm'];
    $Qcomment = $row1['comment'];
    $Qstatus = $row1['status'];
    $Qtimestamp = $row1['timestamp'];
    $SId = $row1['Id'];
    $Qusername = $row1['username'];
    $Qpassword = $row1['password'];
    $Qemail = $row1['email'];
    $Qgender = $row1['gender'];
    $Qlocation = $row1['location'];
    $Qcontact_num = $row1['contact_num'];
  }
}




if (isset($_POST['submit'])) {
  //getting the post valuesPetID,IssuedDate,app_ID,Image,Doc_id,OwnerID

  $PetID = $_POST['PetID'];
  $petname = $_POST['PetName'];
  $app_ID = $_POST['app_ID'];
  $Doc_id = $_POST['Doc_id'];
  $Id = $_POST['Id'];
  $OwnerName = $_POST['OwnerName'];

  $app_symptm = $_POST['app_symptm'];
  $create_datetime = date("Y-m-d H:i:s");
  //$OwnerID=$_GET($Id); 
  $ppic = $_FILES["prescription"]["name"];



  // get the image extension
  $extension = substr($ppic, strlen($ppic) - 4, strlen($ppic));

  // allowed extensions
  $allowed_extensions = array(".jpg", ".jpeg", ".png", ".gif");

  // Validation for allowed extensions .in_array() function searches an array for a specific value.
  if (!in_array($extension, $allowed_extensions)) {
    echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
  } else {
    //reupload the image file
    $imgnewfile = "";
    $imgnewfile = md5($imgnewfile) . time() . $extension;

    // Code for move image into directory
    move_uploaded_file($_FILES["prescription"]["tmp_name"], "prescription/" . $imgnewfile);


    $query = mysqli_query($conn, "insert into prescription(PetID,IssuedDate,app_ID,Image,Doc_id,OwnerID) value('$PetID','$create_datetime', '$app_ID','$imgnewfile', '$Doc_id', '$Id')");

    if ($query) {
      echo "<script>alert('You have successfully inserted the data');</script>";
      echo "<script type='text/javascript'> document.location ='AcceptPets.php'; </script>";
    } else {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
  <title>prescription</title>
  <link rel="icon" href="icon3.jpg">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <style>
    body {
      color: #fff;
      background: #63738a;
      font-family: 'Roboto', sans-serif;
    }

    .form-control {
      height: 40px;
      box-shadow: none;
      color: #969fa4;
    }

    .form-control:focus {
      border-color: #5cb85c;
    }

    .form-control,
    .btn {
      border-radius: 3px;
    }

    .signup-form {
      width: 450px;
      margin: 0 auto;
      padding: 30px 0;
      font-size: 15px;
    }

    .signup-form h2 {
      color: #636363;
      margin: 0 0 15px;
      position: relative;
      text-align: center;
    }

    .signup-form h2:before,
    .signup-form h2:after {
      content: "";
      height: 2px;
      width: 30%;
      background: #d4d4d4;
      position: absolute;
      top: 50%;
      z-index: 2;
    }

    .signup-form h2:before {
      left: 0;
    }

    .signup-form h2:after {
      right: 0;
    }

    .signup-form .hint-text {
      color: #999;
      margin-bottom: 30px;
      text-align: center;
    }

    .signup-form form {
      color: #999;
      border-radius: 3px;
      margin-bottom: 15px;
      background: #f2f3f7;
      box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
      padding: 30px;
    }

    .signup-form .form-group {
      margin-bottom: 20px;
    }

    .signup-form input[type="checkbox"] {
      margin-top: 3px;
    }

    .signup-form .btn {
      font-size: 16px;
      font-weight: bold;
      min-width: 140px;
      outline: none !important;
    }

    .signup-form .row div:first-child {
      padding-right: 10px;
    }

    .signup-form .row div:last-child {
      padding-left: 10px;
    }

    .signup-form a {
      color: #fff;
      text-decoration: underline;
    }

    .signup-form a:hover {
      text-decoration: none;
    }

    .signup-form form a {
      color: #5cb85c;
      text-decoration: none;
    }

    .signup-form form a:hover {
      text-decoration: underline;
    }
  </style>

  <script language="javascript" type="text/javascript">
    function onLoadBody() {
      document.getElementById("OwnerName").readOnly = true;
      document.getElementById("contactno").readOnly = true;
      document.getElementById("PetName").readOnly = true;
      document.getElementById("app_symptm").readOnly = true;


    }
  </script>

</head>

<body onload="onLoadBody()">
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
          <a class="nav-link active" href="appointment.php">Appointment</a>
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
          </li>
        </ul>
      </form>
    </div>
  </nav>
  <br>
  <br>


  <div class="signup-form">

    <form method="POST" enctype="multipart/form-data">

      <h2>Prescription</h2>

      <p class="hint-text">Add image.</p>
      <div class="form-group">

        <input type="hidden" class="form-control" name="PetID" id="PetID" value="<?php echo $QPetID; ?>" required="true">
        <input type="hidden" class="form-control" name="app_ID" id="app_ID" value="<?php echo $Qapp_ID; ?>" required="true">
        <input type="hidden" class="form-control" name="Doc_id" id="Doc_id" value="<?php echo $QDoc_id; ?>" required="true">
        <input type="hidden" class="form-control" name="Id" id="Id" value="<?php echo $QId; ?>" required="true">

        <div>
          Pet Name
          <input type="text" class="form-control" name="PetName" id="PetName" value="<?php echo $QPetname; ?>" required="true">
        </div>

        <div>
          Owner Name
          <input type="text" class="form-control" name="OwnerName" id="OwnerName" value="<?php echo $Qusername; ?>" required="true">
        </div>


        <div>
          Doctor Email
          <input type="text" class="form-control" name="contactno" id="doc_email" value="<?php echo $email; ?>" required="true">


          <div>

            Symptom
            <input type="text" class="form-control" name="app_symptm" id="app_symptm" placeholder="symptm " value="<?php echo $Qapp_symptm; ?>" required="true">
          </div>


          <div class="form-group">Prescription
            <input type="file" class="form-control" name="prescription" required="true">
            <span style="color:red; font-size:12px;">Only jpg / jpeg/ png /gif format allowed.</span>
          </div>



          <div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Submit</button>
          </div>
        </div>
      </div>
  </div>

  </form>

  <div class="text-center">View pending appointment!! <a href="Pending_appointment.php">View</a></div>
  </div>

  <?php
  if (isset($_GET['Service_approve'])) {
    $Approval_id = $_GET['Service_approve'];
    $status2 = "Customer attend";
    $query2 = "UPDATE appointment SET Status='$status2' WHERE app_ID ='$Approval_id'";

    $r3 = mysqli_query($conn, $query2);
    if (mysqli_error($conn)) {
      echo "Errror: " . mysqli_error($conn);
    }
  }
  ?>

</body>

</html>