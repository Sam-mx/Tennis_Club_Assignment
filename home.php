<!DOCTYPE html>
<html lang="en">

<head>
  <title>TMC Academy | Tennis Club</title>
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

  <!--Slides-->
  <!-- Container for the image gallery -->
  <div id="Slides">
    <div class="carousel slide" data-bs-ride="carousel" id="carousel-home">
      <div class="carousel-inner">
        <div class="carousel-item active bg-1">
          <div class="carousel-caption">
            <h5>Welcome to<span> TMC Tennis Club</span></h5>
          </div>
        </div>
        <div class="carousel-item bg-2">
          <div class="carousel-caption">
            <h5>Worldwide <span>Sport</span></h5>
            <p>Tennis</p>
          </div>
        </div>
        <div class="carousel-item bg-3">
          <div class="carousel-caption">
            <h5>Fun <span>Matches</span></h5>
            <p>Tennis</p>
          </div>
        </div>
      </div>
      <div id="pre-next">
        <button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#carousel-home" type="button">
          <span aria-hidden="true" class="carousel-control-prev-icon"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" data-bs-slide="next" data-bs-target="#carousel-home" type="button">
          <span aria-hidden="true" class="carousel-control-next-icon"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <!--thumbnails-->
      <div class="carousel-indicators">
        <button aria-label="Slide 1" class="active" data-bs-slide-to="0" data-bs-target="#carousel-home" type="button">
          <img class="img-fluid" src="img/slide1.jpg" />
        </button>
        <button aria-label="Slide 2" data-bs-slide-to="1" data-bs-target="#carousel-home" type="button">
          <img class="img-fluid" src="img/slide2.jpg" />
        </button>
        <button aria-label="Slide 3" data-bs-slide-to="2" data-bs-target="#carousel-home" type="button">
          <img class="img-fluid" src="img/slide3.jpg" />
        </button>
      </div>
    </div>
  </div>

  <!-- Welcome Starts-->
  <div class="container mt-3" id="welcome">
    <div class="col-md-10">
      <h2>Welcome to TMC Tennis Club</h2>
      <br />
      <p>
        At TMC Tennis Club, we are dedicated to promoting the sport of tennis
        and fostering a vibrant community of tennis enthusiasts. Whether
        you're a seasoned pro or a beginner, our club offers something for
        everyone.
      </p>

      <p>
        With a rich history and a passion for the game, we strive to provide
        top-notch facilities, expert coaching, and exciting events to help you
        take your tennis journey to the next level.
      </p>

      <p>
        Explore our website to learn more about our club, our talented
        players, and the upcoming events and matches. Join us in the pursuit
        of tennis excellence!
      </p>
      <p><a href="events.php#register" class="btn btn-md">Register for upcoming Events and Activities</a></p>
    </div>
    <hr />
  </div>

  <div class="container">
    <div class="row mt-3">
      <div class="col-md-3 mt-3 p-3 text-center">
        <img src="img/medal.png" alt="" height="100px" class="mx-auto" />
        <br />
        <h4>Top 3 clubs in TMC Academy</h4>
        <p>We are a large and vibrant community</p>
      </div>

      <div class="col-md-3 mt-3 p-3 text-center">
        <img src="img/tennis.png" alt="" height="100px" class="mx-auto" />
        <br />
        <h4>30% of TMC students are here</h4>
        <p>Largest club in TMC Academy</p>
      </div>

      <div class="col-md-3 mt-3 p-3 text-center">
        <img src="img/team.png" alt="" height="100px" class="mx-auto" />
        <br />
        <h4>From all different majors</h4>
        <p>All united in the club</p>
      </div>

      <div class="col-md-3 mt-3 p-3 text-center">
        <img src="img/chart.png" alt="" height="100px" class="mx-auto" />
        <br />
        <h4>60% are undergraduate</h4>
        <p>While 40% of our club have completed postgraduate study</p>
      </div>

      <hr />
    </div>
  </div>

  <!--Cards -->
  <div class="container" id="home-blah">
    <h2 class="text-center mt-3">Our Club</h2>
    <div class="row mt-3">
      <div class="col-md-4 mt-3 p-3 mx-auto" id="player">
        <a href="players.php">
          <div class="card mx-auto">
            <img class="card-img-top" src="img/player.jpg" alt="Card image" style="width: 100%" />
            <br />
            <div class="card-body">
              <h4 class="card-title">Player Profiles</h4>
              <br />
              <p class="card-text">
                Find out our players and their acheivements
              </p>

              <p class="pt-3"><span>Discover our players ❯</span></p>
            </div>
          </div>
        </a>
      </div>

      <div class="col-md-4 mt-3 p-3 mx-auto" id="event">
        <a href="events.php">
          <div class="card mx-auto">
            <img class="card-img-top" src="img/courts.jpg" alt="Card image" style="width: 100%" />
            <br />
            <div class="card-body">
              <h4 class="card-title">Upcoming Events and Matches</h4>
              <br />
              <p class="card-text">Join us for tournaments and training</p>

              <p class="pt-3"><span>Explore more ❯</span></p>
            </div>
          </div>
        </a>
      </div>
    </div>
    <hr />
    <div class="p-3" id="blah">
      <h2 class="text-center">Join Us</h2>
      <br />
      <h6 class="text-center">
        Are you passionate about tennis and looking to become a part of a
        vibrant tennis community? Join TMC Tennis Club and enjoy a host of
        benefits.
      </h6>
      <h6 class="text-center">
        Whether you're a seasoned player or a beginner, TMC Tennis Club
        welcomes everyone. Become a part of our tennis family today and take
        your love for the sport to new heights!
      </h6>
    </div>
    <div class="row">
      <div class="col-md-6 p-3 mx-auto" id="blah-contact">
        <hr />
        <a href="contact.php">
          <div class="card mx-auto">
            <div class="card-body">
              <h4 class="card-title">Contact Us</h4>
              <br />
              <p class="card-text">
                Our Club Relations team is here to help you along the way.
              </p>

              <p class="pt-3">
                <span>Connect with us ❯ </span>
              </p>
            </div>
          </div>
        </a>
        <hr />
      </div>

      <div class="col-md-6 p-3 mx-auto" id="blah-about">
        <hr />
        <a href="about.php">
          <div class="card mx-auto">
            <div class="card-body">
              <h4 class="card-title">About Us</h4>
              <br />
              <p class="card-text">
                Stay up to date with the latest information and history of the
                club.
              </p>

              <p class="pt-3">
                <span>Find out what's happening ❯</span>
              </p>
            </div>
          </div>
        </a>
        <hr />
      </div>
      <hr />
    </div>
  </div>

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

  <!--Footer-->
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