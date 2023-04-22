<?php

//database conection  file
include('..\db_conn.php');
//Code for deletion
session_start();
$username=$_SESSION['username'];



if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$profilepic=$_GET['ppic'];
$ppicpath="profilepics"."/".$profilepic;
$sql=mysqli_query($conn,"delete from pets where PetID=$rid");
unlink($ppicpath);
echo "<script>alert('Data deleted');</script>"; 
echo "<script>window.location.href = 'petindex.php'</script>";     
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" href="..\image\icon3.jpg">
<title>Pets</title>
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
            <a class="nav-link" href="..\dashboard.php">Home <span class="sr-only">(current)</span></a>
          </li>

        
          <li class="nav-item">
            <a class="nav-link active" href="..\appointment.php">Appointment</a>
          </li>
          <li class="nav-item">
            <a class="nav-link inactive" href="#">My Pets</a>
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
      <br>
      <br>
      <br>

<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Pet <b>Details</b></h2>
                    </div>
                       <div class="col-sm-7" align="right">
                        <a href="petinsert.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New Pet</span></a>
                                        
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Profile Pic</th>
                        <th>Pet Name</th>                       
                        <th>Pet Owner</th>
                        <th>Type</th>
                        <th>Breed</th>
                        <th>Birthday</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $ret=mysqli_query($conn,"select * from pets where OwnerName='$username'");
                         //$query1="SELECT * FROM users WHERE username='$username'";
                        $cnt=1;
                        $row=mysqli_num_rows($ret);
                        if($row>0){
                        while ($row=mysqli_fetch_array($ret)) {

                    ?>
<!--Fetch the Records -->
                    <tr>
                        <td><?php echo $cnt;?></td>
                        <td><img src="profilepics/<?php  echo $row['ProfilePic'];?>" width="80" height="80"></td>
                        <td><?php  echo $row['PetName'];?> </td>
                        <td><?php  echo $row['OwnerName'];?></td>   
                        <td><?php  echo $row['Type'];?></td>                   
                        <td><?php  echo $row['breed'];?></td>         
                        <td><?php  echo $row['Bday'];?></td>
                        <td>
                            <a href="petread.php?viewid=<?php echo htmlentities ($row['PetID']);?>" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                            <a href="petedit.php?editid=<?php echo htmlentities ($row['PetID']);?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="petindex.php?delid=<?php echo ($row['PetID']);?>&&ppic=<?php echo $row['ProfilePic'];?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete ?');"><i class="material-icons">&#xE872;</i></a>
                        </td>
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