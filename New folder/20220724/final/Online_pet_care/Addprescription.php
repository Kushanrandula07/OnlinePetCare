<?php 
session_start();
require('db_conn.php');

$username = $_SESSION['username'];
$Approvalstatus= 'Accepted';

$query1="SELECT * FROM appointment WHERE Doc_name='$username'";

  $r1= mysqli_query($conn, $query1);


  $nor1= mysqli_num_rows($r1);

   if($nor1>0){
   while ($row1= mysqli_fetch_array($r1)){
    //print_r($row1);
                $QPetname=$row1['Petname'];
                $QDoc_id=$row1['Doc_id'];
                $Qstatus=$row1['status'];
                $QownerID=md5($row1['Id']);
                $Qapp_ID=$row1['app_ID'];
                

            }
          }




if(isset($_POST['submit']))
  {
    //getting the post values
    $petname=$_POST['PetName'];
    $OwnerID=$_POST['Id'];
    $contno=$_POST['contactno'];
    $typeofpet=$_POST['type'];
    $breed=$_POST['breed'];
    $birthday=$_POST['bday'];
    $prescription=$_FILES["prescription"]["name"];

    // get the image extension
    $extension = substr($prescription,strlen($prescription)-4,strlen($prescription));

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

    // Code for move image into directory
    move_uploaded_file($_FILES["prescription"]["tmp_name"],"prescription/".$imgnewfile);

    
    $query=mysqli_query($conn, "insert into prescription(PetName,OwnerID,contact_num,Type,breed,Bday,ProfilePic) value('$petname','$OwnerID', '$contno','$typeofpet', '$breed', '$birthday','$imgnewfile' )");

    if ($query) {
    echo "<script>alert('You have successfully inserted the data');</script>";
    echo "<script type='text/javascript'> document.location ='petindex.php'; </script>";
    } else{
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
<link rel="icon" href=".\image\icon3.jpg">
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
        document.getElementById("contactno").readOnly = true;
        

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
            <a class="nav-link active" href="..\logout.php">Logout</a>
          </li></ul>
        </form>
      </div>
    </nav>
    <br>
    <br>


<div class="signup-form">

    <form  method="POST" enctype="multipart/form-data" >

    <h2>Add Prescription</h2>

    <p class="hint-text">Add image.</p>
        <div class="form-group">
        <div class="row">
        <div class="col">
        Pet Name
        <input type="text" class="form-control" name="PetName" value="<?php echo $petname; ?>" required="true"></div>

        <div class="col">
        Owner Name
        <input type="text" class="form-control" name="OwnerName" id="OwnerName" value="<?php echo $username; ?>" required="true"></div>
        </div></div>

        <div class="form-group">
        Doctor Name
        <input type="text" class="form-control" name="contactno" id="contactno" value="<?php echo $username; ?>"  required="true">
        </div>

        <div class="form-group">
        <div class="row">
        <div class="col">
        Issued Date
        <input type="text" class="form-control" name="issueddate" placeholder="issued date" required="true"></div>
        <div class="col">
        Prescription Type
        <input type="text" class="form-control" name="prc_type" required="true"></div>
        </div>
        </div>

       <div class="form-group">Prescription
        <input type="file" class="form-control" name="profilepic"  required="true">
        <span style="color:red; font-size:12px;">Only jpg / jpeg/ png /gif format allowed.</span>
        </div>

      
        <div class="form-group">
        <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Submit</button>
        </div>

    </form>

<div class="text-center">View Aready Inserted Data!!  <a href="petindex.php">View</a></div>
</div>

</body>
</html>