<?php

require('db_conn.php');
session_start();
 $email=$_SESSION['email'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
   
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="icon3.jpg">

    <title>Admin</title>
    

    <link rel="canonical" href=".\bootstrap-4.0.0\docs\4.0\examples\dashboard">

    <!-- Bootstrap core CSS -->
    <link href=".\bootstrap-4.0.0\dist\css\bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href=".\bootstrap-4.0.0\docs\4.0\examples\dashboard" rel="stylesheet">
  </head>

  <body>

    <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Online Pet Care</a>

      <ul class="navbar-nav px-3">
        <li class="nav-item">
          <a class="nav-link active" href="requestpetcemetery.php">Request Pet Cemetry</a>
        </li>
      </ul>
      
      <ul class="navbar-nav px-3">
        <li class="nav-item">
          <a class="nav-link active" href="logout.php">Log out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              
              <li class="nav-item">
                <a class="nav-link" href="admin/View Doctors.php">
                  <span data-feather="users"></span>
                  Doctors Mangement
                </a>
              </li>
              
              
              <li class="nav-item">
                <a class="nav-link" href="./Admin/View Owners.php">
                  <span data-feather="users"></span>
                  Pet Owners
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./Admin/View Pets.php">
                  <span data-feather="users"></span>
                  Pets Management

                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./Admin/View Pet Care Center.php">
                  <span data-feather="users"></span>
                  Pet Care Center
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./Admin/View Pet shop.php">
                  <span data-feather="users"></span>
                  Pet Shops
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="pending_petcemtryreq.php">
                  <span data-feather="users"></span>
                  Pet Cemetry
                </a>
              </li>

            </ul>

            
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
               <!-- <button class="btn btn-sm btn-outline-secondary">Share</button>-->
                <button class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button>
            </div>
          </div>

          <canvas class="my-4" id="myChart" width="900" height="380"></canvas>

          <h2>Section title</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1,001</td>
                  <td>Lorem</td>
                  <td>ipsum</td>
                  <td>dolor</td>
                  <td>sit</td>
                </tr>
                
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    



  </body>
</html>
