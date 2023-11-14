<!DOCTYPE html>
<html lang="en">

<head>
  <title>Events and Matches | Tennis Club</title>
  <link rel="icon" type="image/x-icon" href="img/TMCLogo.ico" />
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />

  <!-- Icons-->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <?php
  if (isset($_POST["submit"])) {
    if (!empty($_POST['user']) && !empty($_POST['pass'])) {
      $user = $_POST['user'];
      $pass = $_POST['pass'];
      $con = mysqli_connect('localhost', 'root', '', 'tennisclub');
      $query = mysqli_query($con, "SELECT * FROM admin_login WHERE Username='" . $user . "' AND Password='" . $pass . "'");
      $numrows = mysqli_num_rows($query);
      if ($numrows != 0) {
        while ($row = mysqli_fetch_assoc($query)) {
          $dbusername = $row['Username'];
          $dbpassword = $row['Password'];
        }
        if ($user == $dbusername && $pass == $dbpassword) {
          session_start();
          $_SESSION['sess_user'] = $user;
          header("Location: admin.php");
        }
      } else {
        echo '<script>alert("Invalid Credentials");</script>';
      }
    }
  }
  // define variables to empty values  
  $nameErr = $emailErr = $mobilenoErr = $genderErr = $websiteErr = $agreeErr = "";
  $name = $email = $mobileno = $gender = $website = $agree = "";

  //Input fields validation  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //String Validation  
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else {
      $name = input_data($_POST["name"]);
      // check if name only contains letters and whitespace  
      if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $nameErr = "Only alphabets and white space are allowed";
      }
    }
    //Event Name Validation
    if (empty($_POST["ename"])) {
      $enameErr = "EventName is required to be selected";
    } else {
      $ename = input_data($_POST["ename"]);
    }

    //Email Validation   
    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = input_data($_POST["email"]);
      // check that the e-mail address is well-formed  
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }

    //Number Validation  
    if (empty($_POST["phno"])) {
      $mobilenoErr = "Mobile no is required";
    } else {
      $mobileno = input_data($_POST["phno"]);
      // check if mobile no is well-formed  
      if (!preg_match("/^[0-9]*$/", $mobileno)) {
        $mobilenoErr = "Only numeric value is allowed.";
      }
      //check mobile no length should not be less and greator than 11  
      if (strlen($mobileno) != 11) {
        $mobilenoErr = "Mobile number must contain 11 digits.";
      }
    }


    //Empty Field Validation  
    if (empty($_POST["gender"])) {
      $genderErr = "Gender is required";
    } else {
      $gender = input_data($_POST["gender"]);
    }

    //Checkbox Validation  
    if (!isset($_POST['agree'])) {
      $agreeErr = "Accept terms of services before submit.";
    } else {
      $agree = input_data($_POST["agree"]);
    }
  }
  function input_data($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  //Registration

  if (isset($_POST['register'])) {
    $con = mysqli_connect('localhost', 'root', '', 'tennisclub');


    if ($nameErr == "" && $emailErr == "" && $mobilenoErr == "" && $genderErr == "" && $agreeErr == "") {

      $sql = "INSERT INTO event_registration(id,Name,Email,Gender,Phno,Event_name,Remarks) VALUES (NULL,'$_POST[name]',
    '$_POST[email]','$_POST[gender]','$_POST[phno]','$_POST[ename]','$_POST[remark]')";

      if ($con->query($sql) === TRUE) {
        echo '<script>alert("You have been registered.")</script>';
      } else {
        echo '<script>alert(""Error: " . $sql . "<br>" . $con->error");</script>';
      }
      $con->close();
    } else {
      echo '<script>alert("You didn\'t filled up the form correctly.")</script>';
      echo '<script>window.location="#register";</script>';
    }
  } ?>
  <!-- Logo Section -->
  <header>
    <div class="Logo__Sector">
      <div class="Logo__img">
        <a href="home.php">
          <img src="img/Logo.png" alt="" />
        </a>
      </div>
    </div>
  </header>

  <!-- Nav tabs -->
  <nav class="navbar" id="nav">
    <div class="container">
      <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="players.php">Players</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="events.php">Events and Matches</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact us</a>
        </li>
      </ul>

      <form a class="search-bar">
        <input type="search" placeholder="Search..." />
        <button type="submit"><i class="bx bx-search"></i></button>
      </form>
    </div>
  </nav>
  <!--EVENTs STARTS-->
  <div class="events">
    <div class="card" id="banner">
      <img class="card-img-top" src="img/events-banner.jpg" height="450px" alt="" />
      <div class="card-img-overlay">
        <h2>Events and Matches</h2>
        <p><a href="#register" class="btn btn-lg" id="event-regis">Register for upcoming Events and Activities</a></p>
      </div>
    </div>

    <div id="bc">
      <div class="container">
        <nav style="--bs-breadcrumb-divider: '>'; font-weight: 500" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="home.php">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Events and Matches
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="container-fluid text-center mt-3" id="tournament">
      <h2 class="text-center" id="event-header">Tournament and Festivals</h2>

      <div class="container mt-3">
        <div class="row">
          <div class="col-md-4">
            <div class="events-grid">
              <div class="events-grid-image">
                <img src="img/gallery4.jpg" alt="" />
                <div class="events-grid-box">
                  <h1>11</h1>
                  <p>Nov</p>
                </div>
              </div>
              <div class="events-grid-txt">
                <span>Tournaments</span>
                <h2>Tennis Tournament 2023</h2>
                <ul>
                  <li>
                    <i class="fa fa-calendar" aria-hidden="true"></i> Nov 11,
                    2023
                  </li>
                  <li>
                    <i class="fa fa-clock" aria-hidden="true"></i> 9:00 AM -
                    4:00 PM
                  </li>
                  <br />
                  <li><i class="bx bxs-map"></i>TMC Tennis Club Courts</li>
                </ul>
                <p>
                  Join us for the annual Tennis Tournament. Show off your
                  skills and compete with fellow tennis enthusiasts. Open to
                  players of all levels.
                </p>
                <a href="#register">Register Now</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="events-grid">
              <div class="events-grid-image">
                <img src="img/gallery5.jpg" alt="" />
                <div class="events-grid-box">
                  <h1>15</h1>
                  <p>Dec</p>
                </div>
              </div>
              <div class="events-grid-txt">
                <span>Festival</span>
                <h2>University's Winter Sports Festival</h2>
                <ul>
                  <li>
                    <i class="fa fa-calendar" aria-hidden="true"></i> Dec 15,
                    2023
                  </li>
                  <li>
                    <i class="fa fa-clock" aria-hidden="true"></i> 9:00 AM -
                    4:00 PM
                  </li>
                  <br />
                  <li><i class="bx bxs-map"></i>TMC Academy</li>
                </ul>
                <p>
                  Join us for the Winter Sports Festival. Show off your skills
                  and compete with fellow tennis enthusiasts. Open to players
                  of all levels.
                </p>
                <a href="#register">Register Now</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="events-grid">
              <div class="events-grid-image">
                <img src="img/gallery6.jpg" alt="" />
                <div class="events-grid-box">
                  <h1>3</h1>
                  <p>Jan</p>
                </div>
              </div>
              <div class="events-grid-txt">
                <span>Mini-Tournament</span>
                <h2>Auditions</h2>
                <ul>
                  <li>
                    <i class="fa fa-calendar" aria-hidden="true"></i> Jan 3,
                    2024
                  </li>
                  <li>
                    <i class="fa fa-clock" aria-hidden="true"></i> 9:00 AM -
                    4:00 PM
                  </li>
                  <br />
                  <li><i class="bx bxs-map"></i>TMC Tennis Club Courts</li>
                </ul>
                <p>
                  Auditioning for the University's Representative Tennis
                  Player who is going to participate in the upcoming SEA Game.
                </p>
                <a href="#register">Register Now</a>
              </div>
            </div>
          </div>
        </div>
        <hr />
      </div>
    </div>
    <div class="container-fluid text-center mt-3" id="training">
      <h2 id="event-header">Training and Camping</h2>

      <div class="container mt-3">
        <div class="row">
          <div class="col-md-6">
            <div class="events-grid">
              <div class="events-grid-image">
                <img src="img/gallery2.jpg" alt="" />
                <div class="events-grid-box">
                  <h1>20</h1>
                  <p>Nov</p>
                </div>
              </div>
              <div class="events-grid-txt">
                <span>Camps</span>
                <h2>Junior Tennis Camp</h2>
                <ul>
                  <li>
                    <i class="fa fa-calendar" aria-hidden="true"></i> Nov 20 -
                    Nov 30, 2023
                  </li>
                  <li>
                    <i class="fa fa-clock" aria-hidden="true"></i> 10:00 AM -
                    2:00 PM (Daily)
                  </li>
                  <br />
                  <li><i class="bx bxs-map"></i>TMC Tennis Club Courts</li>
                </ul>
                <p>
                  Our Junior Tennis Camp is designed for young tennis
                  enthusiasts. Improve your skills, make new friends, and have
                  a blast on the court!
                </p>
                <a href="#register">Register Now</a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="events-grid">
              <div class="events-grid-image">
                <img src="img/gallery1.jpg" alt="" />
                <div class="events-grid-box">
                  <h1>30</h1>
                  <p>Oct</p>
                </div>
              </div>
              <div class="events-grid-txt">
                <span>Training</span>
                <h2>Training with our coaches and players</h2>
                <ul>
                  <li>
                    <i class="fa fa-calendar" aria-hidden="true"></i> Oct 30 -
                    Dec 31, 2023
                  </li>
                  <li>
                    <i class="fa fa-clock" aria-hidden="true"></i> 1:00 PM -
                    3:00 PM (Daily)
                  </li>
                  <br />
                  <li><i class="bx bxs-map"></i>TMC Tennis Club Courts</li>
                </ul>
                <p>
                  Whether you're a seasoned player or a beginner, TMC Tennis
                  Club welcomes everyone. Become a part of our tennis family
                  today and take your love for the sport to new heights!
                </p>
                <a href="#register">Register Now</a>
              </div>
            </div>
          </div>
        </div>
        <hr />
      </div>
    </div>
    <div class="container" id="register">
      <form class="container" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2 class="text-center">Register for Events</h2>
        <div class="form-floating mb-3 mt-5">
          <input type="text" class="form-control" name="name" id="name" placeholder="" />
          <label for="name">Name
            <span class="error">* <?php echo $nameErr; ?> </span></label>
        </div>

        <div class="form-floating mb-3">
          <input type="email" class="form-control" name="email" id="email" placeholder="" />
          <label for="email">Email
            <span class="error">* <?php echo $emailErr; ?> </span></label>
        </div>

        <div class="row">
          <div class="col">
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="gender" id="male" value="Male" />
              <label class="form-check-label" for="male"> Male </label>
            </div>
          </div>
          <div class="col">
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="gender" id="radio" value="Female" />
              <label class="form-check-label" for="flexRadioDefault1">
                Female
                <span class="error" id="gend-error">* <?php echo $genderErr; ?> </span>
              </label>
            </div>
          </div>
        </div>

        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="phno" id="phno" placeholder="" />
          <label for="email">Phone Number
            <span class="error">* <?php echo $mobilenoErr; ?> </span></label>
        </div>

        <div>
          <select id="ename" name="ename" class="form-select mb-3" required>
            <option selected disabled value="">Event Name</option>
            <option value="Tennis Tournament 2023">Tennis Tournament 2023</option>
            <option value="University\'s Winter Sports Festival">
              University's Winter Sports Festival
            </option>
            <option value="Auditions">Auditions</option>
            <option value="Junior Tennis Camp">Junior Tennis Camp</option>
            <option value="Training with our coaches and players">
              Training with our coaches and players
            </option>
          </select>
        </div>

        <div class="form-floating mb-3">
          <textarea type="text" class="form-control" rows="7" id="remark" name="remark" placeholder=""></textarea>
          <label for="remark">Remarks</label>
        </div>


        <input id="TOS" type="checkbox" name="agree"><span id="TOS1">Agree to Terms of Service:</span>
        <span class="error">* <?php echo $agreeErr; ?> </span>

        <button type="submit" class="btn btn-lg mt-3" name="register">Register Now</button>
      </form>
    </div>
  </div>
  <!--EVENTS ENDS-->


  <button onclick="topFunction()" id="myBtn" title="Go to top">
    <img src="img/arrow.png" />
  </button>

  <!--Login Form Starts-->
  <button class="login-open" id="loginbtn" onclick="openForm()">
    ADMIN LOGIN
  </button>

  <div class="Login">
    <div class="login-form" id="myForm">
      <form action="" class="login-container" method="POST">
        <h1 class="text-center">Admin Login</h1>
        <br />
        <label for="user"><b>Name</b></label>
        <input type="text" placeholder="Enter Username" name="user" required />

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="pass" required />

        <button type="submit" class="btn" name="submit">Login</button>
        <button type="button" class="btn cancel" onclick="closeForm()">
          Close
        </button>
      </form>
    </div>
  </div>
  <!--Login Form Ends-->

  <footer>
    <img class="mx-auto p-3" src="img/Logo-Small.png" alt="" />
    <hr />
    <div class="container p-3">
      <div class="row">
        <div class="col-6">
          <p class="text-center">&copy; Copyright UOS. All Rights Reserved</p>
        </div>
        <div class="col-6 text-end" id="icons">
          <a href="https://www.facebook.com/tmc.edu.sg" class="btn rounded border p-2"><i class="bx bxl-facebook-circle"></i></a>
          <a href="https://twitter.com/tmcacademy" class="btn rounded border p-2"><i class="bx bxl-twitter"></i></a>
          <a href="https://www.instagram.com/tmcacademy/" class="btn rounded border p-2"><i class="bx bxl-instagram"></i></a>
          <a href="https://www.youtube.com/channel/UC3BCJHPSlk4KO3vmWj7fdHQ" class="btn rounded border p-2"><i class="bx bxl-youtube"></i></a>
        </div>
      </div>
    </div>
    <br />
  </footer>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

  <script langauge="javascript" type="text/javascript" src="script.js"></script>
</body>

</html>