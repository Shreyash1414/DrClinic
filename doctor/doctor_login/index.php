<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css" />
    <title>dropdown Menu</title>
  </head>
  <body>
    <?php
          require "../../includes/conncetion.php";
          $login=false;
          $msg=false;
          if($_SERVER['REQUEST_METHOD']=='POST')
          {
            $email=$_POST['email'];
            $password=$_POST['pass'];
          

            $sql="SELECT * FROM `doctors` WHERE `email` LIKE '$email'";
            $result= mysqli_query($conn,$sql);
            $num=mysqli_num_rows($result);
            if($num==1)
            {
                while($row= mysqli_fetch_assoc($result))
                {
                    if(password_verify($password,$row['password']))
                    {
                      session_start();
                      $login=true;
                      $_SESSION['loggedin']=true;
                      $_SESSION['username']=$email;
                      header("location:/drclinic/doctor/doc_dash/index.php");
                    }
                    else{
                      $msg="Invalid Credential";
                    }
                }
            }
            else{
              $msg="Invalid Credential";

            }


          }
    ?>


<div class="menu-bar">
      <h1 class="logo">Dr<span>Clinic.</span></h1>
      <ul>
        <li><a href="/drclinic">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Doctors <i class="fas fa-caret-down"></i></a>

            <div class="dropdown-menu">
                <ul>
                  <li><a href="/drclinic/doctor/doctor_login/">Doctor Login</a></li>
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


    <!-- <div class="container">
        <div class="loginLogo">
            <h2>Log In</h2>
        </div>
        <form action="">
            <label for="email">Email:</label>
            <input type="text">
        </form>
    </div> -->
    <?php
       if($msg)
       {
           echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
           <strong>'.$msg.'!</strong> Please Check The Entered Details.
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
       }
    ?>

    <div class="container">
      <div class="title">Log In</div>
      <div class="content">
        <form action="/drclinic/doctor/doctor_login/index.php" method="post">
          <div class="user-details">
            <div class="input-box">
              <span class="details">Email</span>
              <input type="text" id="email" name="email" placeholder="Enter your email" required>
            </div>
         
            <div class="input-box">
              <span class="details">Password</span>
              <input type="text" id="pass" name="pass" placeholder="Enter your password" required>
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