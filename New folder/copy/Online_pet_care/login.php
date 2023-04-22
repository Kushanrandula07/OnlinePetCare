<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Login</title>

    <link rel="icon" href="icon3.jpg">
    <link href=".\bootsrap\css\bootstrap.min.css" rel="stylesheet">
</head>

<body onload="onLoadBody()">

    <style>
        body {
            color: #fff;
            background: #63738a;
            font-family: 'Roboto', sans-serif;
            background: url("cover.jpg") no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            width: 100%;
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

            color: black;
            border-radius: 3px;
            margin-bottom: 15px;
            background: white;
            opacity: 0.9;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }

        .signup-form .form-group {
            margin-bottom: 50px;
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
            padding-right: 50px;
        }

        .signup-form .row div:last-child {
            padding-left: 50px;
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

        .test1 {
            text-align: center;
        }
    </style>





    <?php
    require('db_conn.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['email'])) {
        $email = stripslashes($_REQUEST['email']);    // removes backslashes
        $email = mysqli_real_escape_string($conn, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        $role     = stripslashes($_REQUEST['role']);
        $role     = mysqli_real_escape_string($conn, $role);


        switch ($role) {
            case '1':

                // Check petowner is exist in the database
                $query = "SELECT * FROM pet_owners WHERE email='$email' AND password='" . md5($password) . "'";

                $result = mysqli_query($conn, $query);

                if (mysqli_error($conn)) {
                    echo "Errror: " . mysqli_error($conn);
                }


                $rows = mysqli_num_rows($result);

                if ($rows == 1) {

                    $_SESSION['email'] = $email;
                    // Redirect to user dashboard page(petowners)
                    header("Location:dashboard.php");
                } else {

                    echo "<div class='test1'>
                  <script><h3 >Incorrect Email/password/user type.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p></script>
                  </div>";
                }

                break;

            case '2':

                // Check doctor is exist in the doctor database
                $query2 = "SELECT * FROM doctor WHERE Doc_email='$email' AND Password='" . md5($password) . "'";

                $result2 = mysqli_query($conn, $query2);

                if (mysqli_error($conn)) {
                    echo "Errror: " . mysqli_error($conn);
                }


                $rows2 = mysqli_num_rows($result2);

                if ($rows2 == 1) {

                    $_SESSION['email'] = $email;
                    // Redirect to doctor dashboard page(doctor)
                    header("Location:dashboardDoctor.php");
                } else {
                    echo "<div class='test1'>
                        <h3 >Incorrect Email/password/user type.</h3><br/>
                        <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                        </div>";
                }
                break;

            case '3':

                // Check petcarecenter is exist in the petcarecenter database
                $query3 = "SELECT * FROM petcarecenter WHERE email='$email' AND password='" . md5($password) . "'";

                $result3 = mysqli_query($conn, $query3);
                if (mysqli_error($conn)) {
                    echo "Errror: " . mysqli_error($conn);
                }


                $rows3 = mysqli_num_rows($result3);

                if ($rows3 == 1) {


                    $_SESSION['email'] = $email;
                    // Redirect to user dashboard page(petcarecenter)
                    header("Location:dashboardPetCareCen.php");
                } else {
                    echo "<div class='test1'>
                    <h3 >Incorrect Email/password/user type.</h3><br/>
                    <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                    </div>";
                }
                break;

            case '4':

                // Check petshop is exist in the petshop database
                $query4 = "SELECT * FROM petshops WHERE email='$email' AND password='" . md5($password) . "'";

                $result4 = mysqli_query($conn, $query4);
                if (mysqli_error($conn)) {
                    echo "Errror: " . mysqli_error($conn);
                }


                $rows4 = mysqli_num_rows($result4);

                if ($rows4 == 1) {


                    $_SESSION['email'] = $email;
                    // Redirect to user dashboard page(pet shop)
                    header("Location:dashboardPetShop.php");
                } else {
                    echo "<div class='test1'>
                    <h3 >Incorrect Email/password/user type.</h3><br/>
                    <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                    </div>";
                }
                break;

            case '5':

                // Check Admin is exist in the admin database
                $query5 = "SELECT * FROM admin WHERE Email='$email' AND password='$password'";

                $result5 = mysqli_query($conn, $query5);
                if (mysqli_error($conn)) {
                    echo "Errror: " . mysqli_error($conn);
                }


                $rows5 = mysqli_num_rows($result5);

                if ($rows5 == 1) {


                    $_SESSION['email'] = $email;
                    // Redirect to user dashboard page(admin)
                    header("Location:dashboardAdmin.php");
                } else {

                    echo "<div class='test1'>
                    <h3 >Incorrect Email/password/user type.</h3><br/>
                    <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                    </div>";
                }
                break;



            default:

                echo "<div class='test1'>
                    <h3 >Incorrect Email/password/user type.</h3><br/>
                    <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                    </div>";


                break;
        }
    } else
    ?>
    <div class="signup-form">

        <form class="border shadow p-3 rounded" action="login.php" method="post" style="width: 450px;">
            <h2 class="text-center p-3">LOGIN</h2>


            <div class="mb-3">
                <label for="email" class="form-label">User Email</label>

                <input type="text" class="form-control" name="email" id="email" required="email">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required="Password">
            </div>

            <div class="mb-1">
                <label class="form-label">Select User Type:</label>
            </div>



            <select class="form-select mb-3" name="role" aria-label="Default select example">
                <option selected value="#">Please Select User type</option>
                <option value="1">Pet Owner</option>
                <option value="2">Doctor</option>
                <option value="3">Pet Care Center</option>
                <option value="4">Pet Shop</option>
                <option value="5">Admin</option>

            </select>

            <input type="submit" value="Login" name="submit" class="login-button">
            <p class="link">Don't have an account? <a href="Signup.php" style="color:blue;">Registration Now</a></p>
        </form>


</body>

</html>