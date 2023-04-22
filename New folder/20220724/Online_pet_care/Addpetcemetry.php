<?php 
require('db_conn.php');
session_start();
 $username=$_SESSION['username'];

  $query1="SELECT * FROM pet_owners WHERE username='$username'";
  $r1= mysqli_query($conn, $query1);

  $nor1= mysqli_num_rows($r1);

    if($nor1>0){
            while ($row1= mysqli_fetch_array($r1)){
                //print_r($row1);
                $Qid=$row1['Id'];
                $Qusername=$row1['username'];
                $Qemail=$row1['email'];
                $Qpassword=$row1['password'];
                $Qdatetime=$row1['create_datetime'];
                $Qlocation=$row1['location'];
                $Qcontact_num=$row1['contact_num'];

$_SESSION['email']=$Qemail;
            }
          }
$selectSQL6 = "SELECT * FROM pets WHERE OwnerName='$username'";
    $r6= mysqli_query($conn, $selectSQL6);
    if(mysqli_error($conn)){
        echo "Errror: ".mysqli_error($conn);
    }

    $nor6= mysqli_num_rows($r6);


if(isset($_POST['submit']))
  {
    //getting the post values
    $petname=$_POST['selectpetname'];
    $petowner=$_POST['OwnerName'];
    $Deathdate=$_POST['Deathdate'];
    $Deathplace=$_POST['Deathplace'];
    $ppic=$_FILES["PetImage"]["name"];

    // get the image extension
    $extension = substr($ppic,strlen($ppic)-4,strlen($ppic));

    // allowed extensions
    $allowed_extensions = array(".jpg",".jpeg",".png",".gif");

    // Validation for allowed extensions .in_array() function searches an array for a specific value.
    if(!in_array($extension,$allowed_extensions))
    {
    echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    }

    else
    {
    //reupload the image file
    $imgnewfile=md5($imgnewfile).time().$extension;
    $stat='pending';
    // Code for move image into directory
    move_uploaded_file($_FILES["PetImage"]["tmp_name"],"./pet/profilepics/".$imgnewfile);

    
    $query=mysqli_query($conn, "insert into petcemetry(PetName,DeathDate,FuneralPlace,PetImage,UserID,UserName,Status) value('$petname','$Deathdate', '$Deathplace', '$imgnewfile' ,'$Qid', '$petowner', '$stat')");

    if ($query) {
    echo "<script>alert('You have successfully inserted the data');</script>";
    echo "<script type='text/javascript'> document.location ='Viewpetcemetry.php'; </script>";
    } else{
    echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
    }
  }
?>


 ?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add petcemetry</title>

   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href=".\image\icon3.jpg">
    <link rel="canonical" href=".\bootstrap-4.0.0\docs\4.0\examples\jumbotron">
    <link href=".\bootstrap-4.0.0\dist\css\bootstrap.min.css" rel="stylesheet">
    <link href="jumbotron.css" rel="stylesheet">

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
    .form-control, .btn {        
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
    .signup-form h2:before, .signup-form h2:after {
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

    }
</script>






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
            <a class="nav-link" href="Viewpetcemetry.php">View Pet Cemetry</span></a>
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

    <div class="signup-form">

    <form  method="POST" enctype="multipart/form-data" >

    <h2>Pet Cemetry</h2>

    <p class="hint-text">Fill below form.</p>
        <div class="form-group">
        <div class="row">
        <div class="col">
       Pet Name
                      <select name="selectpetname" class="form-control">
                        <?php
                          while ($row=mysqli_fetch_array($r6)) {
                        ?>
                        <option id="<?php echo $row['PetName'];?>"><?php echo $row['PetName'];?></option>
                        <?php
                        }
                        ?>
                        
                      </select>
      </div>
        <div class="col">
        Owner Name
        <input type="text" class="form-control" name="OwnerName" id="OwnerName" value="<?php echo $username; ?>" required="true"></div>
        </div>          
        </div>

        <div class="form-group">Death Date
        <input type="date" class="form-control" name="Deathdate"  required="true" >
        </div>

        <div class="form-group">Funeral Place
        <input type="text" class="form-control" name="Deathplace" placeholder="Enter place " required="true">
        </div>

        <div class="form-group">Pet Image
        <input type="file" class="form-control" name="PetImage"  required="true">
        <span style="color:red; font-size:12px;">Only jpg / jpeg/ png /gif format allowed.</span>
        </div>      
      
        <div class="form-group">
        <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Submit</button>
        </div>

    </form>

<div class="text-center">View Aready Inserted Data!!  <a href="petindex.php">View</a></div>
</div>
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