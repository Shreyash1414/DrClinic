<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css" />
    <!-- CSS only -->
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
            $birthdate=$_POST['birthdate'];
            $age=$_POST['age'];
            $contactNumber=$_POST['contactNumber'];
            $altContactNum=$_POST['altContactNum'];
            $aadhar=$_POST['aadhar'];
            $bloodGroup=$_POST['bloodGroup'];
            $gender=$_POST['gender'];
            $address=$_POST['address'];
            $password=$_POST['pass'];
            $confirmPass=$_POST['confPass'];


          // Chechking if Patient already Present
          $sql1="SELECT * FROM `patients` WHERE `contactNumber` LIKE '$contactNumber'";
          $result1 = mysqli_query($conn, $sql1);
          $num = mysqli_num_rows($result1);
          if($num!=0)
          {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>This Number is Already Registered!</strong>.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
          }
          else{
            $hash=password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `patients` (`firstName`, `lastName`, `birthDate`, `age`, `contactNumber`, `altContactNumber`, `aadhar`, `bloodGroup`, `gender`, `address`,`password`) VALUES ('$firstName', '$lastName', '$birthdate', '$age', '$contactNumber', '$altContactNum', '$aadhar', '$bloodGroup', '$gender', '$address','$hash')";
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
      <div class="title">Patient Resgister</div>
      <div class="content">
        <form action="/drclinic/patient/patientReg.php" method="post">
          <div class="user-details">
            <div class="input-box">
              <span class="details">First Name:</span>
              <input type="text" id="fname" name="fname" placeholder="Enter your First Name" required>
            </div>
         
            <div class="input-box">
              <span class="details">Last Name:</span>
              <input type="text" id="lname" name="lname" placeholder="Enter your Last Name" required>
            </div>

            <div class="input-box">
              <span class="details">Birthdate:</span>
              <input type="date" id="birthdate" name="birthdate">
            </div>

            <div class="input-box">
              <span class="details">Age:</span>
              <input type="text" id="age" name="age" placeholder="Enter your Age">
            </div>

            <div class="input-box">
              <span class="details">Contect No.:</span>
              <input type="text" id="contactNumber" name="contactNumber" placeholder="Enter your Contact Number">
            </div>

            <div class="input-box">
              <span class="details">Alternate Contact .No:</span>
              <input type="text" id="altContactNum" name="altContactNum" placeholder="Enter your Alternate Number">
            </div>

            <div class="input-box">
              <span class="details">Aadhar Number:</span>
              <input type="text" id="aadhar" name="aadhar" placeholder="Enter your Aadhar Number">
            </div>

            <div class="input-box">
              <span class="details">Blood Group:</span>
              <select name="bloodGroup" id="gender" class="bigBox">
                <option value="male">Choose</option>
                <option value="female">B+</option>
                <option value="other">A+</option>
                <option value="other">A-</option>
                <option value="other">B-</option>
                <option value="other">AB-</option>
                <option value="other">AB+</option>
                <option value="other">O+</option>
                <option value="other">O-</option>

              </select>
            </div>

            <div class="input-box">
              <span class="details">Gender:</span>
              <select name="gender" id="gender" class="bigBox">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
               
              </select>
            </div>

            <div class="input-box">
              <span class="details">Address:</span>
              <input type="text" id="address" name="address" placeholder="Enter your Addres">
            </div>

            <div class="input-box">
              <span class="details">Password:</span>
              <input type="text" id="pass" name="pass" placeholder="Enter your Password">
            </div>

            <div class="input-box">
              <span class="details">Confirm password:</span>
              <input type="text" id="confPass" name="confPass" placeholder="Enter your Password Agian">
            </div>

          
          </div>
          <div class="button">
            <input type="submit" value="Register">
          </div>
        </form>
      </div>
    </div>
        <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>