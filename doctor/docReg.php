<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    <link rel="stylesheet" href="assets/css/style.css" />
    <title>dropdown Menu</title>
  </head>
  <body>
  <div class="menu-bar">
      <h1 class="logo">Dr<span>Clinic.</span></h1>
      <ul>
        <li><a href="/drclinic">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Doctors <i class="fas fa-caret-down"></i></a>

            <div class="dropdown-menu">
                <ul>
                  <li><a href="#">Doctor Login</a></li>
                  <li><a href="/drclinic/doctor/docReg.php">Doctor SignUp</a></li>
                </ul>
              </div>
        </li>
        <li><a href="#">Patients <i class="fas fa-caret-down"></i></a>

            <div class="dropdown-menu">
                <ul>
                <li><a href="#">Patient Login</a></li>
                <li><a href="/drclinic/patient/patientReg.php">Patient SignUp</a></li>
                </ul>
            </div>
        </li>
       
        <li><a href="#">Contact us</a></li>
      </ul>
    </div>

    <?php
        require "../includes/conncetion.php";

        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $firstName=$_POST['fname'];
            $lastName = $_POST['lname'];
            $email=$_POST['email'];
            $password=$_POST['pass'];
            $contactNumber=$_POST['number'];
            $aadhar=$_POST['aadhar'];
            $address=$_POST['address'];
            $clinicAddress=$_POST['clinicAddress'];
            $city=$_POST['city'];
            $country=$_POST['country'];
          
            //Check for already Present Data
            $sql1="SELECT * FROM `doctors` WHERE `email` LIKE '$email'";
            $result1 = mysqli_query($conn, $sql1);
            $num = mysqli_num_rows($result1);
            if($num!=0)
            {
              echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>This Email is Already Registered!</strong> You can login in your Account.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
            else{
              $hash=password_hash($password, PASSWORD_DEFAULT);
              $sql = "INSERT INTO `doctors` (`firstName`, `lastName`, `password`, `contactNumber`, `aadharNumber`, `Address`, `clinicAddress`, `city`, `country`, `email`) VALUES ('$firstName', '$lastName', '$hash', '$contactNumber', '$aadhar', '$address', '$clinicAddress', '$city', '$country', '$email')";
              $result = mysqli_query($conn,$sql);
              if($result)
              {
                  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Registration Successful!</strong> You can login in your Account.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
              }
              else{
                  echo "Some Error Occured";
              }
            }
            

           
        }



    ?> 
   

    <div class="container">
      <div class="title">Doctor Account Resgister</div>
      <div class="content">
        <form action="/Drclinic/doctor/docReg.php" method="post">
          <div class="user-details">
            <div class="input-box">
              <span class="details">First Name:</span>
              <input type="text" id="fName" name="fname" placeholder="Enter your First Name" required>
            </div>
         
            <div class="input-box">
              <span class="details">Last Name:</span>
              <input type="text" id="lName" name="lname" placeholder="Enter your Last Name" required>
            </div>

            <div class="input-box">
              <span class="details">Email:</span>
              <input type="email" id="email" name="email" placeholder="Enter the Email">
            </div>

            <div class="input-box">
              <span class="details">Password:</span>
              <input type="text" id="pass" name="pass" placeholder="Enter your Age">
            </div>

            <div class="input-box">
              <span class="details">Confirm Password:</span>
              <input type="text" id="confPass" name="confPass" placeholder="Enter your Contact Number">
            </div>

            <div class="input-box">
              <span class="details">Contact .No:</span>
              <input type="text" id="number" name="number" placeholder="Enter your Alternate Number">
            </div>

            <div class="input-box">
              <span class="details">Aadhar Number:</span>
              <input type="text" id="aadhar" name="aadhar" placeholder="Enter your Aadhar Number">
            </div>

            <div class="input-box">
              <span class="details">Address:</span>
              <input type="text" id="address" name="address" placeholder="Enter your Blood Group">
            </div>

            <div class="input-box">
              <span class="details">Clinic Address:</span>
              <input type="text" id="clinicAddress" name="clinicAddress" placeholder="Enter your Blood Group">
            </div>

            <div class="input-box">
              <span class="details">City:</span>
              <input type="text" id="city" name="city" placeholder="Enter your Blood Group">
            </div>

            <div class="input-box">
              <span class="details">Country:</span>
              <input type="text" id="country" name="country" placeholder="Enter your Blood Group">
            </div>
          
          </div>
          <div class="button">
            <input type="submit" value="Register">
          </div>
        </form>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>