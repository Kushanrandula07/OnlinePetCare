<!DOCTYPE html>
<html>
<link rel="stylesheet" href=".\bootsrap\bootstrap.min.css">
<script src=".\bootsrap\bootstrap.min.js"></script>
<link rel="stylesheet" href=".\Assets\CSS\login.css">
<link href=".\bootstrap-4.3.1-dist\css\bootstrap.min.css" rel="stylesheet">
<link href=".\Css\feature-tiles.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="icon" href="icon3.jpg">

<head>
	<meta charset="utf-8">
	<title>Online Pet care</title>


	<style>
		body {
			color: #fff;
			background: #63738a;
			background-image: url('cover.jpg');
			font-family: 'Roboto', sans-serif;
			background-size: cover;
			background-position: center;
			background-attachment: fixed;
			width: 100%;
		}

		.form {
			margin: 50px auto;
			width: 300px;
			padding: 30px 30px;
			background: white;
		}

		h1 {
			color: #104;
			margin: 0px auto 25px;
			font-size: 200px;
			font-weight: 300;
			text-align: center;
		}

		.login-input {
			font-size: 25px;
			border: 1px solid #ccc;
			padding: 10px;
			margin-bottom: 25px;
			height: 25px;
			width: calc(100% - 23px);
		}

		.login-input:focus {
			border-color: #6e8095;
			outline: none;
		}

		.login-button {
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

		.link {
			color: #666;
			font-size: 15px;
			text-align: center;
			margin-bottom: 0px;
		}

		.link a {
			color: #666;
		}

		h3,
		h4 {
			color: white;
			font-weight: normal;
			text-align: center;
			padding-top: 10px;
		}

		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		td,
		th {
			border: 1px solid #dddddd;
			text-align: left;
			padding: 10x;

		}

		tr:nth-child(even) {
			background-color: white;

		}

		.fixed-content {
			position: sticky;
		}


		h5,
		p.aboutus {

			color: blue;
			padding: 20PX;
		}
	</style>

</head>

<body>




	<div class="container">



		<div class="row">
			<div class="fixed-content" textalign="center">
				<h1><b>Online Pet Care </b><img src="./downloadimages/coverpage.gif" width="300" height="200"></h1>
			</div>
		</div>


		<div class="row">
			<div class="col-sm-10">
				<h3> We Are Connected Below Facilities</h3>
			</div>
			<div class="col-sm-2">
				<div class="text-right">
					<button type="button" class="btn btn-success" onClick="location.href='login.php'">Login</button>
					<button type="button" class="btn btn-danger" onClick="location.href='Signup.php'">Sign Up</button>
				</div>
			</div>
		</div>



		<div class="row">

			<div class="col-sm-4">
				<div class="box">
					<div class="inner">
						<h4>Pet Care Center</h4>
						<div class="image">
							<img src="./downloadimages/3g.jpg" width="300" height="300">
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="box">
					<div class="inner">
						<h4>Doctors</h4>
						<div class="image">
							<img src="./downloadimages/45.jpg" width="300" height="300">
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="box">
					<div class="inner">
						<h4>Pets Owners</h4>
						<div class="image">
							<img src="./downloadimages/2we.jpg" width="300" height="300">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<div class="box">
					<div class="inner">
						<h4>Pet Shops</h4>
						<div class="image">
							<img src="./downloadimages/2.jpg" width="300" height="300">
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="box">
					<div class="inner">
						<h4>Pet Cemetry</h4>
						<div class="image">
							<img src="./downloadimages/petcem.jpg" width="300" height="300">
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="box">
					<div class="inner">
						<h4>Admin</h4>
						<div class="image">
							<img src="./downloadimages/admin.jpg" width="300" height="300">
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-3">
				<div class="aboutus1"><img src="./downloadimages/icon.gif" width="500" height="300"></div>
			</div>

			<div class="col-sm-4">
				<h5 class="aboutus2">About Us</h5>
				<p class="aboutus3">
					<br>
					The pet care system allows users to take care of their pets from anywhere with internet access.
					The system provided by pioneer solutions includes several components to ensure the management of
					all the essential elements of animal welfare. The following sections of this document contain an
					extensive list of functional requirements that the entire system and individual components must have.
					This is a web-based system for pets. Through the system users can get an idea for their own pets and
					other pets too. This system connects Doctors, Pet owners, Pet Salesman and Pet care centers.
					Use this system pet owner can save their valuable time without not going to pet care centers.
				</p>
			</div>
			<div class="col-sm-2">
			</div>
		</div>


	</div>
	<br>
	<br>


</body>

</html>