<?php
require('db_conn.php');
session_start();
$email = $_SESSION['email'];


$query1 = "SELECT * FROM pet_owners WHERE email='$email'";
$r1 = mysqli_query($conn, $query1);
$query2 = "SELECT * FROM doctor WHERE Doc_email='$email'";
$r2 = mysqli_query($conn, $query2);
$query3 = "SELECT * FROM petcarecenter WHERE email='$email'";
$r3 = mysqli_query($conn, $query3);
$query4 = "SELECT * FROM petshops WHERE email='$email'";
$r4 = mysqli_query($conn, $query4);

$nor1 = mysqli_num_rows($r1);
$nor2 = mysqli_num_rows($r2);
$nor3 = mysqli_num_rows($r3);
$nor4 = mysqli_num_rows($r4);
//print_r($nor1);
if ($nor1 > 0) {
  while ($row1 = mysqli_fetch_array($r1)) {
    //print_r($row1);
    $Qid = $row1['Id'];
    $Qusername = $row1['username'];
    $Qemail = $row1['email'];
    $Qpassword = $row1['password'];
    $Qlocation = $row1['location'];
    $Qcontact_num = $row1['contact_num'];
  }
  $out = '<a class="nav-link active" href="appointment.php">Appointment</a>';
  $out1 = '<a class="nav-link active" href=".\pet\petindex.php">My Pets</a>';
  $out2 = '<a class="nav-link" href="dashboard.php">Home</a>';
} elseif ($nor2 > 0) {
  while ($row1 = mysqli_fetch_array($r2)) {
    //print_r($row1);
    $Qid = $row1['Doc_id'];
    $Qusername = $row1['Doc_name'];
    $Qemail = $row1['Doc_email'];
    $QJobtitle = $row1['Jobtitle'];
    $Qcontact_num = $row1['Contact_num'];
    $Qpassword = $row1['Password'];
    $QWorking_days = $row1['Working_days'];
    $QWorkinghours = $row1['working_hours'];
    $Qlocation = $row1['location'];
  }
  $out = '<a class="nav-link active" href="Pending_appointment.php">Pending Appointment</a>';
  $out1 = '<a class="nav-link active" href="doctorschedule.php">Doctor Schedule</a>';
  $out2 = '<a class="nav-link" href="dashboardDoctor.php">Home</a>';
} elseif ($nor3 > 0) {
  while ($row1 = mysqli_fetch_array($r3)) {
    //print_r($row1);
    $Qid = $row1['PCC_id'];
    $Qusername = $row1['pet_care_center_name'];
    $Qemail = $row1['email'];
    $Qpassword = $row1['password'];
    $QWorking_days = $row1['Working_days'];
    $QWorkinghours = $row1['working_hours'];
    $Qcontact_num = $row1['contact_num'];
    $Qlocation = $row1['location'];
  }
  $out = '';
  $out1 = '<a class="nav-link active" href="doctorschedule.php">Doctor Schedule</a>';
  $out2 = '<a class="nav-link" href="dashboardPetCareCen.php">Home</a>';
} elseif ($nor4 > 0) {
  while ($row1 = mysqli_fetch_array($r4)) {
    //print_r($row1);
    $Qid = $row1['PetshopID'];
    $Qusername = $row1['shop_name'];
    $Qemail = $row1['email'];
    $Qpassword = $row1['password'];
    $Qcontact_num = $row1['contact_num'];
    $QWorking_days = $row1['Working_days'];
    $QWorkinghours = $row1['working_hours'];
    $Qlocation = $row1['location'];
  }
  $out = '<a class="nav-link active" href="#">Add Sale Items</a>';
  $out1 = '';
  $out2 = '<a class="nav-link" href="dashboardPetShop.php">Home</a>';
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>My details</title>

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="icon3.jpg">



  <link rel="canonical" href=".\bootstrap-4.0.0\docs\4.0\examples\jumbotron">

  <!-- Bootstrap core CSS -->
  <link href=".\bootstrap-4.0.0\dist\css\bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="jumbotron.css" rel="stylesheet">


  <Style>
    .signup-form {
      margin: 50px auto;
      width: 500px;
      padding: 30px 30px;
      background: white;
      border-style: solid;
    }

    .input {
      margin: 20px auto;
      width: 100%;
      padding: 10px 10px;
      background: white;
    }

    h5 {
      color: #104;
      margin: 0px auto 25px;
      font-size: 50px;
      font-weight: 300;
      text-align: center;
    }

    .submit {
      color: #fff;
      background: #55a1ff;
      border: 0;
      outline: 0;
      width: 100%;
      height: 50px;
      font-size: 16px;
      text-align: center;
      cursor: pointer;
    }

    label {
      text-align: Left;
      width: 100%;
      height: 50px;
      font-size: 16px;
    }
  </Style>

  <script language="javascript" type="text/javascript">
    function onLoadBody() {
      document.getElementById("email").readOnly = true;

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
          <?php echo $out2 ?>

        </li>


        <li class="nav-item">
          <?php echo $out ?>
        </li>
        <li class="nav-item">
          <?php echo $out1 ?>
        </li>

        <li class="nav-item inactive">
          <a class="nav-link" href="profiledetails.php">My Details<span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item  active dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Other
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="./view/doctors.php">Doctors</a>
            <a class="dropdown-item" href="./view/PetCareCenter.php">Pet Care Centers</a>
            <a class="dropdown-item" href="./view/Petshop.php">Pet Shops</a>
            <a class="dropdown-item" href="./view/Pets.php">Pets</a>
            <a class="dropdown-item" href="Viewpetcemetry.php">Pet Cemetery</a>
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



  <br><br>
  <br><br>


  <main role="main">

    <div>

      <form action="" method="post" class="signup-form">
        <h5>My Details</h5>



        <label>
          Your Name:
          <br><input type="text" name="name" class="input" value="<?php echo $Qusername; ?>" placeholder="name" required>
        </label><br><br>

        <label>
          Mobile:
          <br><input type="text" name="contact" class="input" value="<?php echo $Qcontact_num; ?>" placeholder="contact no" required="required" pattern="[0-9]{10,11}" title="please enter only numbers between 10 to 11 for mobile no." />
        </label><br><br>


        <label>
          Location:
          <br><input type="text" name="address" class="input" value="<?php echo $Qlocation; ?>" placeholder="Location" required>
        </label><br><br>


        <label>
          Email: (You cant update your email)
          <br><input type="email" name="email" id="email" class="input" value="<?php echo $Qemail; ?>" placeholder="email" required>
        </label><br><br>


        <?php
        if ($nor2 > 0) {
        ?>
          <label>
            Job Title:
            <br><input type="text" name="Jobtitle" class="input" value="<?php echo $QJobtitle; ?>" placeholder="Location" required>
          </label><br><br>


          <label>
            Working hours:
            <br><input type="text" name="Workinghours" class="input" value="<?php echo $QWorkinghours; ?>" placeholder="Location" required>
          </label><br><br>

          <label>
            Working Days:
            <br><input type="text" name="Working_days" class="input" value="<?php echo $QWorking_days; ?>" placeholder="Working days" required>
          </label><br><br>
        <?php
        } elseif ($nor3 > 0) {
        ?>

          <label>
            Working hours:
            <br><input type="text" name="Workinghours" class="input" value="<?php echo $QWorkinghours; ?>" placeholder="Location" required>
          </label><br><br>
          <label>
            Working Days:
            <br><input type="text" name="Working_days" class="input" value="<?php echo $QWorking_days; ?>" placeholder="Working days" required>
          </label><br><br>

        <?php
        } elseif ($nor4 > 0) {
        
        ?>
        <label>
          Working hours:
          <br><input type="text" name="Workinghours" class="input" value="<?php echo $QWorkinghours; ?>" placeholder="Location" required>
        </label><br><br>
        <label>
          Working Days:
          <br><input type="text" name="Working_days" class="input" value="<?php echo $QWorking_days; ?>" placeholder="Working days" required>
        </label><br><br>
        <?php
      }
      ?>


        <label>
          <p class="link"> Update password <a href="password_reset.php"> Reset Password</a></p>
        </label>
        <br><br>

        <button name="submit" class="submit" type="submit">UpdateProfile</button> <br>


      </form> <br>

      <br>


    </div>





  </main><br>
  <br>
  <br>
  <br>

  <footer class="container">
    <p>&copy; Kushan 2021</p>
  </footer>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
  </script>
  <script src=".\bootstrap-4.0.0\assets\js\vendor\popper.min.js"></script>
  <script src=".\bootstrap-4.0.0\dist\js\bootstrap.min.js"></script>
</body>

</html>