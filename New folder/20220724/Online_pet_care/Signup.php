<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="icon" href=".\image\icon3.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" 
    crossorigin="anonymous">

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
<body onload="onLoadBody()">
<?php
    require('db_conn.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($conn, $username);
        $role     =stripslashes($_REQUEST['role']);      
        $role     =mysqli_real_escape_string($conn, $role);

        $Jobtitle     =stripslashes($_REQUEST['jobtittle']);      
        $Jobtitle     =mysqli_real_escape_string($conn, $Jobtitle);
        $workingdays     =stripslashes($_REQUEST['workingdays']);      
        $workingdays     =mysqli_real_escape_string($conn, $workingdays);
        $working_hours     =stripslashes($_REQUEST['working_hours']);      
        $working_hours     =mysqli_real_escape_string($conn, $working_hours);
        $PetCareCenter     =stripslashes($_REQUEST['petcarecenter']);      
        $PetCareCenter     =mysqli_real_escape_string($conn, $PetCareCenter);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($conn, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        $conpassword = stripslashes($_REQUEST['password']);
        $conpassword = mysqli_real_escape_string($conn, $password);



        $gender    = stripslashes($_REQUEST['gender']);
        $gender    = mysqli_real_escape_string($conn, $gender);
        //$create_datetime = date("Y-m-d H:i:s");
        $location = stripslashes($_REQUEST['location']);
        $contactnum = stripslashes($_REQUEST['contactnumber']);
        
        //print_r($role);
        switch ($role) {


            case '1':

            $query1 = "SELECT * FROM pet_owners WHERE username='$username' AND password='" . md5($password) . "' AND email='$email'";
                     
                $result = mysqli_query($conn, $query1);
                if(mysqli_error($conn)){
                echo "Errror: ".mysqli_error($conn);
                 }


                $rows = mysqli_num_rows($result);

            if ($rows == 1) {

                echo "Already registered";

            }else{




                $query    = "INSERT into `pet_owners` (username,  password, email,gender,location,contact_num)
                     VALUES ('$username','" . md5($password) . "', '$email','$gender','$location','$contactnum')";
                $result   = mysqli_query($conn, $query);

                if ($result) {
                    echo "<div class='form'>
                     
                     <p class='link'>You are registered successfully.Click here to <a href='login.php'>Login</a></p>
                     </div>";
                    }
                else {
                     echo "<div class='form'>
                     
                     <p class='link'>Required fields are missing.Click here to <a href='registration.php'>registration</a> again.</p>
                     </div>";
                     }
                }


    break;

            case '2':

            // Check doctor is exist in the doctor database
            $query2 = "SELECT * FROM doctor WHERE Doc_name='$username' AND Password='" . md5($password) . "' AND Doc_email='$email'";
                     
                $result2 = mysqli_query($conn, $query2);
                if(mysqli_error($conn)){
                echo "Errror: ".mysqli_error($conn);
                 }


                $rows2 = mysqli_num_rows($result2);

            if ($rows == 1) {

                echo "Already registered";

            }else{

                $query1    = "INSERT into `doctor` (Doc_name, Doc_email, Jobtitle, gender, Contact_num, Password,Working_days,working_hours,PetCareCenter)
                     VALUES ('$username', '$email','$Jobtitle','$gender','$contactnum','" . md5($password) . "', '$workingdays', '$working_hours','$location')";
                 $result1   = mysqli_query($conn, $query1);


                if ($result1) {
                    echo "<div class='form'>
                     
                     <p class='link'>You are registered successfully.Click here to <a href='login.php'>Login</a></p>
                     </div>";
                    }
                else {
                     echo "<div class='form'>
                     
                     <p class='link'>Required fields are missing.Click here to <a href='registration.php'>registration</a> again.</p>
                     </div>";
                     }
                 }


                break;

            case '3':

            // Check petcarecenter is exist in the petcarecenter database
            $query3 = "SELECT * FROM petcarecenter WHERE pet_care_center_name='$username' AND password='" . md5($password) . "' AND email='$email'";
                     
                $result3 = mysqli_query($conn, $query3);
                if(mysqli_error($conn)){
                echo "Errror: ".mysqli_error($conn);
                 }


                $rows3 = mysqli_num_rows($result3);

            if ($rows == 1) {

                echo "Already registered";

            }else{



                $query2    = "INSERT into `petcarecenter` (pet_care_center_name, email, password,Working_days,working_hours,contact_num,location)
                        VALUES ('$username', '$email','" . md5($password) . "','$workingdays','$working_hours', '$contactnum','$location')";
                $result2   = mysqli_query($conn, $query2);


                if ($result2 ) {
                    echo "<div class='form'>
                     
                     <p class='link'>You are registered successfully.Click here to <a href='login.php'>Login</a></p>
                     </div>";
                    }
                else {
                     echo "<div class='form'>
                     
                     <p class='link'>Required fields are missing.Click here to <a href='registration.php'>registration</a> again.</p>
                     </div>";
                     }
                 }

                break;

            case '4':

                // Check petshop is exist in the petshop database
                $query4 = "SELECT * FROM petshops WHERE shop_name='$username' AND password='" . md5($password) . "'";
                     
                $result4 = mysqli_query($conn, $query4);
                if(mysqli_error($conn)){
                echo "Errror: ".mysqli_error($conn);
                 }


                $rows4 = mysqli_num_rows($result4);

            if ($rows == 1) {

                echo "Already registered";

            }else{

                $query3    = "INSERT into `petshops` (shop_name, email, password,Working_days,working_hours,contact_num,location)
                        VALUES ('$username', '$email','" . md5($password) . "','$workingdays','$working_hours', '$contactnum','$location')";
                $result3   = mysqli_query($conn, $query3);


                if ($result3) {
                    echo "<div class='form'>
                     
                     <p class='link'>You are registered successfully.Click here to <a href='login.php'>Login</a></p>
                     </div>";
                    }
                else {
                     echo "<div class='form'>
                     
                     <p class='link'>Required fields are missing.Click here to <a href='registration.php'>registration</a> again.</p>
                     </div>";
                     }
                 }
                break;
            


            default:
                // code...
                break;
        }

 
    } else
        {
      

?>
<div class="signup-form">
    <form  method="post" autocomplete="off">
        <h2> Registration </h2>


        <br>
        <input type="text" class="form-control"  name="username" placeholder="Username" required />
        
        
        <select class="form-select form-control"
                              name="role" 
                              onchange="showHideEle(this, 'jobtittle', this.options[this.selectedIndex].value)"

                              aria-label="Default select example"><!--java script function to show hide elemnt-->
                          <option selected value="#">Please Select User type</option>
                          <option value="1">Pet Owner</option>
                          <option value="2">Doctor</option>
                          <option value="3">Pet Care Center</option>
                          <option value="4">Pet Shop</option>
                          
                      </select>
     
              
        <input type="email" class="form-control" name="email" placeholder="Email Adress" required>
        
        
        <input type="password" class="form-control" name="password" placeholder="Password" required>
        
        
        <input type="password" class="form-control" name="conpassword" placeholder="Re enter password" >

        <!--<input type="text" class="form-control" name="gender" placeholder="M/F">-->
        <label for="gender" id="gender" name="gender" style="display:none;">Gender :</label>

         <input type="radio" id="gender1" name="gender" value="Male" style="display:none;">
         <label for="Male" id="Male" name="Male" style="display:none;" >Male</label>
         <input type="radio"  id="gender2" name="gender" value="Female" style="display:none;" >
         <label for="Female" id="Female" name="Female" style="display:none;">Female</label><br>
                

        <input type="text"  class="form-control" name="location" placeholder="Your location" required>
        
        <input type="text" class="form-control" name="jobtittle" id="jobtittle"  placeholder="Job Title" style="display:none;" >

        

       
        <input type="text" class="form-control" name="contactnumber" maxlength="10" placeholder="Contact Number" pattern="[0-9]{10}" required >


        

        
        <input type="text" class="form-control" name="workingdays" id="workingdays" placeholder="eg: Monday to Friday" style="display:none;" >

        

    
        
       <input type="text" class="form-control" name="working_hours" id="working_hours" placeholder="eg:0800-1700 " style="display:none;">
        
        <input type="text" class="form-control" name="petcarecenter" id="petcarecenter" placeholder="Pet Care Center" style="display:none;">
       
        <input type="submit" name="submit" value="Register" class="login-button">

        <p class="link">Already have an account? <a href="login.php">Login here</a></p>
    </form>

    </div>
    <?php
         }
    ?>

<script language="javascript" type="text/javascript">
    

  function showHideEle(selectSrc, targetEleId, triggerValue) {

  switch(triggerValue){

    case "1" :
    if(selectSrc.value==triggerValue) {
    document.getElementById(targetEleId).style.display = "none";
    document.getElementById('workingdays').style.display = "none";
    document.getElementById('working_hours').style.display = "none";
    document.getElementById('petcarecenter').style.display = "none";
    document.getElementById('gender').style.display = "inline-block";
    document.getElementById('gender1').style.display = "inline-block";
    document.getElementById('gender2').style.display = "inline-block";
    document.getElementById('Male').style.display = "inline-block";
    document.getElementById('Female').style.display = "inline-block";
    }
    break;

    case "2" :
    if(selectSrc.value==triggerValue) {
    document.getElementById(targetEleId).style.display = "inline-block";
    document.getElementById('workingdays').style.display = "inline-block";
    document.getElementById('working_hours').style.display = "inline-block";
    document.getElementById('petcarecenter').style.display = "inline-block";
    document.getElementById('gender').style.display = "inline-block";   
    document.getElementById('gender1').style.display = "inline-block";
    document.getElementById('gender2').style.display = "inline-block";
    document.getElementById('Male').style.display = "inline-block";
    document.getElementById('Female').style.display = "inline-block";
    



     } else {
    document.getElementById(targetEleId).style.display = "none";
    document.getElementById('workingdays').style.display = "none";
    document.getElementById('working_hours').style.display = "none";
    document.getElementById('petcarecenter').style.display = "none";
    document.getElementById('gender').style.display = "none";
    document.getElementById('gender1').style.display = "none";
    document.getElementById('gender2').style.display = "none";
    document.getElementById('Male').style.display = "none";
    document.getElementById('Female').style.display = "none";
    }
    break;

    case "3" :
    if(selectSrc.value==triggerValue) {
    document.getElementById(targetEleId).style.display = "none";
    document.getElementById('workingdays').style.display = "inline-block";
    document.getElementById('working_hours').style.display = "inline-block";
    document.getElementById('petcarecenter').style.display = "none";
    document.getElementById('gender').style.display = "none";
    document.getElementById('gender1').style.display = "none";
    document.getElementById('gender2').style.display = "none";
    document.getElementById('Male').style.display = "none";
    document.getElementById('Female').style.display = "none";


     } else {
    document.getElementById(targetEleId).style.display = "none";
    document.getElementById('workingdays').style.display = "none";
    document.getElementById('working_hours').style.display = "none";
    document.getElementById('petcarecenter').style.display = "none";
    document.getElementById('gender').style.display = "none";
    document.getElementById('gender1').style.display = "none";
    document.getElementById('gender2').style.display = "none";
    document.getElementById('Male').style.display = "none";
    document.getElementById('Female').style.display = "none";
    }


    break;

    case "4" :

    if(selectSrc.value==triggerValue) {
    document.getElementById(targetEleId).style.display = "none";
    document.getElementById('workingdays').style.display = "inline-block";
    document.getElementById('working_hours').style.display = "inline-block";
    document.getElementById('petcarecenter').style.display = "none";
    document.getElementById('gender').style.display = "none";
    document.getElementById('gender1').style.display = "none";
    document.getElementById('gender2').style.display = "none";
    document.getElementById('Male').style.display = "none";
    document.getElementById('Female').style.display = "none";


     } else {
    document.getElementById(targetEleId).style.display = "none";
    document.getElementById('workingdays').style.display = "none";
    document.getElementById('working_hours').style.display = "none";
    document.getElementById('petcarecenter').style.display = "none";
    document.getElementById('gender').style.display = "none";
    document.getElementById('gender1').style.display = "none";
    document.getElementById('gender2').style.display = "none";
    document.getElementById('Male').style.display = "none";
    document.getElementById('Female').style.display = "none";
    }
    break;

    




  }
  
   
  

  } 

</script>


</body>
</html>
