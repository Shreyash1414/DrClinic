<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
                  <li><a href="/drclinic/doctor/doctor_login">Doctor Login</a></li>
                  <li><a href="/drclinic/doctor/docReg.php">Doctor SignUp</a></li>
                </ul>
              </div>
        </li>
        <li><a href="#">Patients <i class="fas fa-caret-down"></i></a>

            <div class="dropdown-menu">
                <ul>
                <li><a href="/drclinic/patient/patientLogin/index.php">Patient Login</a></li>
                <li><a href="/drclinic/patient/patientReg.php">Patient SignUp</a></li>
                </ul>
            </div>
        </li>
       
        <li><a href="#">Contact us</a></li>
      </ul>
    </div>
  </body>
</html>