<?php
require('db_conn.php');
session_start();
$email = $_SESSION['email'];

$query1 = "SELECT * FROM pet_owners WHERE email='$email'";
$r1 = mysqli_query($conn, $query1);

$nor1 = mysqli_num_rows($r1);

if ($nor1 > 0) {
  while ($row1 = mysqli_fetch_array($r1)) {
    //print_r($row1);
    $Qid = $row1['Id'];
    $Qusername = $row1['username'];
    $Qemail = $row1['email'];
    $Qpassword = $row1['password'];
    $Qemail = $row1['email'];
    $Qlocation = $row1['location'];
    $Qcontact_num = $row1['contact_num'];
  }
}


//contactus
if (empty($_SESSION["mail_success"])) $_SESSION["mail_success"] = false;
if (empty($_SESSION["mail_error"])) $_SESSION["mail_error"] = false;

$success = $_SESSION["mail_success"];
$error = $_SESSION["mail_error"];
?>



<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Profile</title>

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="icon3.jpg">
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

        <li class="nav-item inactive">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="appointment.php">Appointment</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href=".\pet\petindex.php">My Pets</a>
        </li>


        <li class="nav-item active">
          <a class="nav-link" href="profiledetails.php">My Details<span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            View
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

  <main role="main">


    <div class="jumbotron">
      <div class="container">
        <h1 class="display-3">Hello,<?php echo $Qusername  ?> </h1>
        <p>Welcome to Online Pet Care This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p>
          <a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a>
        </p>
      </div>
    </div>

    <div class="container">

      <div class="row">
        <div class="col-md-4">
          <h2>Appointment</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-secondary" href="appointment.php" role="button">View Appointment &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>View Pets</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-secondary" href="./view/Pets.php" role="button">View Pets &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <div class="contact-form">
            <h2>Contact us</h2>
            <form class="form-box" method="POST" action="PHPMailer/contactus/email.php">
              <div class="input-box w50">
                <input type="text" name="name" Value="<?php echo $Qusername ?>" readonly required>
                
              </div>
              <br>
              <div class="input-box w50">
                <input type="text" name="email" Value="<?php echo $email ?>" required>
                
              </div>
              <br>
              <div class="input-box w100">
                <textarea name="message" placeholder="Write your message here" required></textarea>
                
              </div>
              
              <div class="input-box w100 message">
                <?php include 'PHPMailer/contactus/contact-message.php'; ?>
                <input class="btn btn-success" type="submit" value="Send message">
              </div>
          </div>
        </div>

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
  <script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
  </script>
  <script src=".\bootstrap-4.0.0\assets\js\vendor\popper.min.js"></script>
  <script src=".\bootstrap-4.0.0\dist\js\bootstrap.min.js"></script>
</body>

</html>