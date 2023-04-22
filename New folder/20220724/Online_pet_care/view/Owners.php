<?php 
require('../db_conn.php');
session_start();
 $username=$_SESSION['username'];
 $Qemail=$_SESSION['email'];

$query1="SELECT * FROM pet_owners WHERE username='$username'";
  $r1= mysqli_query($conn, $query1);
$query2="SELECT * FROM doctor WHERE Doc_name='$username'";
  $r2= mysqli_query($conn, $query2);
$query3="SELECT * FROM petcarecenter WHERE pet_care_center_name='$username'";
  $r3= mysqli_query($conn, $query3);
$query4="SELECT * FROM petshops WHERE shop_name='$username'";
  $r4= mysqli_query($conn, $query4);

  $nor1= mysqli_num_rows($r1);
  $nor2= mysqli_num_rows($r2);
  $nor3= mysqli_num_rows($r3);
  $nor4= mysqli_num_rows($r4);
    //print_r($nor1);
    if($nor1>0){
            while ($row1= mysqli_fetch_array($r1)){
                //print_r($row1);
                $Qid=$row1['Id'];
                $Qusername=$row1['username'];
                $Qemail=$row1['email'];
                $Qpassword=md5($row1['password']);
                $Qlocation=$row1['location'];
                $Qcontact_num=$row1['contact_num'];

            }
            
            $out2='<a class="nav-link" href="../dashboard.php">Home</a>';
            
          }elseif ($nor2>0) {
            while ($row1= mysqli_fetch_array($r2)){
                //print_r($row1);
                $Qid=$row1['Doc_id'];
                $Qusername=$row1['Doc_name'];
                $Qemail=$row1['Doc_email'];
                $QJobtitle=$row1['Jobtitle'];
                $Qcontact_num=$row1['Contact_num'];
                $Qpassword=$row1['Password'];
                $QWorking_days=$row1['Working_days'];
                $QWorkinghours=$row1['working_hours'];
                $QPetCareCenter=$row1['PetCareCenter'];

            }
            
            $out2='<a class="nav-link" href="../dashboardDoctor.php">Home</a>';
          }elseif ($nor3>0) {
            while ($row1= mysqli_fetch_array($r3)){
                //print_r($row1);
                $Qid=$row1['pet_care_center_id'];
                $Qusername=$row1['pet_care_center_name'];
                $Qemail=$row1['email'];
                $Qpassword=$row1['password'];
                $QWorking_days=$row1['Working_days'];
                $QWorkinghours=$row1['working_hours'];
                $Qcontact_num=$row1['contact_num'];
                $Qlocation=$row1['location'];
              }
              
              $out2='<a class="nav-link" href="../dashboardPetCareCen.php">Home</a>';
          }elseif ($nor4>0) {
            while ($row1= mysqli_fetch_array($r4)){
                //print_r($row1);
                $Qid=$row1['PetshopID'];
                $Qusername=$row1['shop_name'];
                $Qemail=$row1['email'];
                $Qpassword=$row1['password'];
                $Qcontact_num=$row1['contact_num'];
                $QWorking_days=$row1['Working_days'];
                $QWorkinghours=$row1['working_hours'];
                $Qlocation=$row1['location'];

            }
            
            $out2='<a class="nav-link" href="../dashboardPetShop.php">Home</a>';
          }


 ?>




<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>View all Owners</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="..\image\icon3.jpg">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Roboto', sans-serif;
        }
        .table-responsive {
            margin: 30px 0;
        }
        .table-wrapper {
            min-width: 1000px;
            background: #fff;
            padding: 20px;
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        .table-title {
            font-size: 15px;
            padding-bottom: 10px;
            margin: 0 0 10px;
            min-height: 45px;
        }
        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }
        .table-title select {
            border-color: #ddd;
            border-width: 0 0 1px 0;
            padding: 3px 10px 3px 5px;
            margin: 0 5px;
        }
        .table-title .show-entries {
            margin-top: 7px;
        }
        .search-box {
            position: relative;
            float: right;
        }
        .search-box .input-group {
            min-width: 200px;
            position: absolute;
            right: 0;
        }
        .search-box .input-group-addon, .search-box input {
            border-color: #ddd;
            border-radius: 0;
        }
        .search-box .input-group-addon {
            border: none;
            border: none;
            background: transparent;
            position: absolute;
            z-index: 9;
        }
        .search-box input {
            height: 34px;
            padding-left: 28px;     
            box-shadow: none !important;
            border-width: 0 0 1px 0;
        }
        .search-box input:focus {
            border-color: #3FBAE4;
        }
        .search-box i {
            color: #a0a5b1;
            font-size: 19px;
            position: relative;
            top: 8px;
        }
        table.table tr th, table.table tr td {
            border-color: #e9e9e9;
        }
        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }
        table.table td:last-child {
            width: 130px;
        }
        table.table td a {
            color: #a0a5b1;
            display: inline-block;
            margin: 0 5px;
        }
        table.table td a.view {
            color: #03A9F4;
        }
        table.table td a.edit {
            color: #FFC107;
        }
        table.table td a.delete {
            color: #E34724;
        }
        table.table td i {
            font-size: 19px;
        }    
        .pagination {
            float: right;
            margin: 0 0 5px;
        }
        .pagination li a {
            border: none;
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            padding: 0 10px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 30px !important;
            text-align: center;
        }
        .pagination li a:hover {
            color: #666;
        }   
        .pagination li.active a {
            background: #03A9F4;
        }
        .pagination li.active a:hover {        
            background: #0397d6;
        }
        .pagination li.disabled i {
            color: #ccc;
        }
        .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }
        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
        }
    </style>
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
            <?php echo $out2 ?>
            
            </li>
        
          <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Other
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="Doctors.php">Doctors</a>
          <a class="dropdown-item" href="PetCareCenter.php">Pet Care Centers</a>
          <a class="dropdown-item" href="Owners.php">Pet Owners</a>
          <a class="dropdown-item" href="Pets.php">Pet </a>
          <a class="dropdown-item" href="Petshop.php">Pet Shops</a>
          
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
<br><br>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2><b>Pet Owners Details</b></h2>
                    </div>                      
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Owner Name</th>
                        <th>Email</th>                       
                        <th>Location</th>
                        <th>Mobile Number</th>
                        <th>Gender</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $ret=mysqli_query($conn,"select * from pet_owners");
                        $cnt=1;
                        $row=mysqli_num_rows($ret);
                        if($row>0){
                        while ($row=mysqli_fetch_array($ret)) {

                    ?>
                <!--Fetch the Records -->
                    <tr>
                        <td><?php echo $cnt;?></td>
                        
                        <td><?php  echo $row['username'];?> </td>
                        <td><?php  echo $row['email'];?></td>   
                        <td><?php  echo $row['location'];?></td>                   
                        <td><?php  echo $row['contact_num'];?></td>         
                        <td><?php  echo $row['gender'];?></td>
                       
                    </tr>
                    <?php 
                    $cnt=$cnt+1;
                    } } else {?>
                    <tr>
                        <th style="text-align:center; color:red;" colspan="6">No Record Found</th>
                    </tr>
                    <?php } ?>   
                      
                </tbody>
            </table>
                       
        </div>
    </div>
</div> 




</body>
</html>