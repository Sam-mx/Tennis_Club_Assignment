<!DOCTYPE html>
<html lang="en">

<head>
  <title>Contact | Tennis Club</title>
  <link rel="icon" type="image/x-icon" href="img/TMCLogo.ico" />
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

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
  <!--CONTACT-->
  <div class="contact">
    <div id="banner">
      <img width="100%" src="img/Contact-us-banner.png" alt="" />
    </div>
    <div id="bc">
      <div class="container">
        <nav style="--bs-breadcrumb-divider: '>'; font-weight: 500" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="home.html">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Contact Us
            </li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="container p-3">
      <h2 class="text-center">Contact Us</h2>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6" id="contact_col1">
          <h3>TMC Academy</h3>
          <p>805 Geylang Road Singapore 389683</p>
          <hr />
          <h3>Phone</h3>
          <p>+65 67272666 ext 2</p>
          <hr />

          <h3>WhatsApp</h3>
          <p>+65 80233870</p>
          <hr />
          <h3>Email</h3>
          <p><a href="mailto:info@tmc.edu.sg">info@tmc.edu.sg</a></p>
          <hr />
          <h3>Social Media</h3>
          <p>
            <a href="https://www.facebook.com/tmc.edu.sg" class="btn rounded border p-2"><i class="bx bxl-facebook-circle"></i></a>
            <a href="https://twitter.com/tmcacademy" class="btn rounded border p-2"><i class="bx bxl-twitter"></i></a>
            <a href="https://www.instagram.com/tmcacademy/" class="btn rounded border p-2"><i class="bx bxl-instagram"></i></a>
            <a href="https://www.youtube.com/channel/UC3BCJHPSlk4KO3vmWj7fdHQ" class="btn rounded border p-2"><i class="bx bxl-youtube"></i></a>
          </p>
          <hr />
        </div>
        <div class="col-md-6" id="contact_col2">
          <h3>Send Us Message</h3>
          <p>
            For joining our club, member inquiries and further information
            about <b>TMC Tennis Club</b> please send us an email.
          </p>

          <form action="mailto:support@open.uos.edu.mm" method="post" onsubmit="return validate()" name="contact_form">
            <div class="mb-3 mt-3">
              <label for="name">Name*</label>
              <input type="text" class="form-control" id="name" placeholder="Your name..." name="name" required />
            </div>
            <div class="mb-3">
              <label for="number">Phone Number*</label>
              <input type="tel" class="form-control" id="number" placeholder="Your phone number..." name="pnumber" required />
            </div>
            <div class="mb-3">
              <label for="email">Email*</label>
              <input type="email" class="form-control" id="email" placeholder="Your email..." name="email" required />
            </div>

            <div class="mb-3">
              <label for="course">Your Message</label>
              <textarea class="form-control" rows="4" id="course" name="text" placeholder="Write something..."></textarea>
            </div>
            <button type="submit" class="btn btn-danger btn-lg">
              Submit
            </button>
          </form>
          <br />
        </div>
      </div>
    </div>

    <div class="google-map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1994.3835474294158!2d103.891795!3d1.315281!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da1817c5fad3f5%3A0xfc0ada6a89620b45!2s805%20Geylang%20Rd%2C%20Singapore%20389683!5e0!3m2!1sen!2ssg!4v1698407419910!5m2!1sen!2ssg" width="600" height="300" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>

  <!--CONTACT ENDS-->

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