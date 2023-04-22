<?php 
//Database Connection
include('../db_conn.php');
if(isset($_POST['submit']))
  {
  	$eid=$_GET['editid'];
  	//Getting Post Values
    $petname=$_POST['petname'];
    $ownername=$_POST['ownername'];
    $cont_no=$_POST['contactno'];
    $breed=$_POST['breed'];
    $bday=$_POST['bday'];

    //Query for data updation
     $query=mysqli_query($conn, "update  pets set PetName='$petname',OwnerName='$ownername', MobileNumber='$cont_no', Breed='$breed', Bday='$bday' where PetID='$eid'");
     
    if ($query) {
      echo "<script>alert('You have successfully update the data');</script>";
      echo "<script type='text/javascript'> document.location ='petindex.php'; </script>";
    }
    else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<link rel="icon" href="..\icon3.jpg">
<title>Pet Edit details</title>
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
		    document.getElementById("breed").readOnly = true;
		    document.getElementById("bday").readOnly = true;
		    document.getElementById("petname").readOnly = true;
		    

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
            <a class="nav-link" href="..\dashboard.php">Home <span class="sr-only">(current)</span></a>
          </li>

        
          <li class="nav-item">
            <a class="nav-link active" href="..\appointment.php">Appointment</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="petindex.php">My Pets</a>
          </li>
          

          <li class="nav-item active">
            <a class="nav-link" href="..\profiledetails.php">My Details<span class="sr-only">(current)</span></a>
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
<br><br>




<div class="signup-form">
    <form  method="POST">
 <?php
$eid=$_GET['editid'];
$ret=mysqli_query($conn,"select * from pets where PetID='$eid'");
while ($row=mysqli_fetch_array($ret)) {
?>
		<h2>Update </h2>
		<p class="hint-text">Update Pet info.</p>

	<div class="form-group">
<img src="profilepics/<?php  echo $row['ProfilePic'];?>" width="120" height="120">
<a href="change-image.php?userid=<?php echo $row['PetID'];?>">Change Image</a>
		</div>

        <div class="form-group">
			<div class="row">
				<div class="col"><input type="text" class="form-control" name="fname" id="petname" value="<?php  echo $row['PetName'];?>" required="true"></div>
				<div class="col"><input type="text" class="form-control" name="lname"  value="<?php  echo $row['OwnerName'];?>" required="true"></div>
			</div>        	
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="contactno" value="<?php  echo $row['contact_num'];?>" required="true" maxlength="10" pattern="[0-9]+">
        </div>
        <div class="form-group">
        	<input type="text" class="form-control" name="breed" id="breed" value="<?php  echo $row['breed'];?>" required="true">
        </div>
		
		<div class="form-group">
			<input type="date" class="form-control" name="bday" id="bday" value="<?php  echo $row['Bday'];?>" required="true">
           
        </div>   

<?php 
}?>
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Update</button>
        </div>
    </form>

</div>
</body>
</html>