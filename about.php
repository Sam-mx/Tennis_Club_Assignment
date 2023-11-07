<!DOCTYPE html>
<html lang="en">

<head>
  <title>About Us | Tennis Club</title>
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
  <!--ABOUT STARTS-->
  <div class="about">
    <div class="card" id="banner">
      <img class="card-img-top" src="img/about-us.jpg" alt="" />
      <div class="card-img-overlay">
        <h2>About Us</h2>
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
              About Us
            </li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="container" id="about-info">
      <h2 class="text-center mt-3">About TMC Tennis Club</h2>
      <br />
      <div class="row">
        <div class="col-md-6 p-3">
          <p>
            <span>Welcome to TMC Tennis Club</span>, where greatness and a
            passion for tennis collide. Our club has a long history and a
            steadfast dedication to the game. This is what sets us apart:
          </p>

          <h4>Our History</h4>
          <p>
            TMC Tennis Club was established in <span>2001</span> and has a
            long history of developing talent, planning fun events, and
            fostering a thriving tennis community. We have had many victories
            over the years and have seen our athletes develop both on and off
            the court.
          </p>

          <h4>Our mission</h4>
          <p>
            Our goals are to advance tennis as a sport, supply first-rate
            equipment, and provide knowledgeable teaching to enable players of
            all skill levels to realize their full potential. Our goals are to
            develop a tennis community and make on-court experiences that
            players will remember.
          </p>

          <h4>Our Facilities</h4>
          <p>
            We are proud of our cutting-edge tennis facilities, which include
            spectator areas, locker rooms, and well-maintained courts. You'll
            discover everything you need to enjoy the game, regardless of your
            level of experience.
          </p>
        </div>
        <div class="col-md-6">
          <img src="img/about1.jpg" alt="" />
        </div>
      </div>
      <hr />


      <h2 class="text-center mt-3">A vibrant and diverse community</h2>
      <br />
      <div class="row mt-3">
        <div class="col-md-6">
          <img src="img/about2.jpg" alt="" />
        </div>
        <div class="col-md-6 p-3">
          <h4>Our Community</h4>
          <p>
            At <span>TMC Tennis Club</span>, we are a community of people who
            are passionate about tennis and more than just a sporting
            facility. You become a member of our tennis family when you join
            our club, not just a member.
          </p>

          <p>
            There are players of all ages and ability levels in our
            diversified community. We think that tennis has a special ability
            to unite people, creating bonds and friendships that extend beyond
            the court. You'll find like-minded people here whether you're a
            novice seeking friendly competition, a parent introducing your
            child to the sport, or an accomplished player aiming for
            perfection.
          </p>

          <p>
            We organize social events, friendly matches, and gatherings, so
            you can interact with fellow members, share your tennis stories,
            and build lasting relationships. Our club is not only a place for
            honing your tennis skills but also a space where you can create
            memorable moments, both on and off the court.
          </p>

          <p>
            We encourage support, camaraderie, and sportsmanship among our
            members, making <span>TMC Tennis Club</span> a warm and welcoming
            environment where everyone is encouraged to achieve their tennis
            goals while having fun and enjoying the wonderful game of tennis.
          </p>
        </div>
      </div>
      <hr />
      <div class="container">
        <h2 class="text-center">Our Achievements</h2>
        <div class="row mt-3">
          <div class="col-md-4 mt-3 p-3 text-center">
            <img src="img/medal.png" alt="" height="100px" class="mx-auto" />
            <br />
            <h4>Three-Time Champion</h4>
            <p>Tennis Tournament 2017, 2020, 2022</p>
          </div>

          <div class="col-md-4 mt-3 p-3 text-center">
            <img src="img/tennis.png" alt="" height="100px" class="mx-auto" />
            <br />
            <h4>Tournament Champions</h4>
            <p>Multiple local and regional tennis tournament championships</p>
          </div>

          <div class="col-md-4 mt-3 p-3 text-center">
            <img src="img/team.png" alt="" height="100px" class="mx-auto" />
            <br />
            <h4>Country's Representative Players</h4>
            <p>SEA GAME 2020</p>
          </div>

          <hr />
        </div>
      </div>
    </div>
    <div class="container" id="about-gallery">
      <h2 id="heading" class="text-center mt-3">Gallery</h2>
      <div class="wrapper">
        <div class="content-area">
          <div class="single-content">
            <img src="img/gallery1.jpg" alt="" />
            <div class="info">
              <h2>Single Match</h2>
              <p>Training</p>
            </div>
          </div>

          <div class="single-content">
            <img src="img/gallery2.jpg" alt="" />
            <div class="info">
              <h2>Double Match</h2>
              <p>Training</p>
            </div>
          </div>

          <div class="single-content">
            <img src="img/gallery3.jpg" alt="" />
            <div class="info">
              <h2>Semi-Final</h2>
              <p>Tournament</p>
            </div>
          </div>

          <div class="single-content">
            <img src="img/gallery4.jpg" alt="" />
            <div class="info">
              <h2>Crowds</h2>
              <p>National Cup</p>
            </div>
          </div>

          <div class="single-content">
            <img src="img/gallery5.jpg" alt="" />
            <div class="info">
              <h2>Audience</h2>
              <p>Tournament</p>
            </div>
          </div>

          <div class="single-content">
            <img src="img/gallery6.jpg" alt="" />
            <div class="info">
              <h2>Courtyard</h2>
              <p>Mini-Tournament</p>
            </div>
          </div>
        </div>
      </div>
      <hr />
    </div>

    <div class="testimonial">
      <h2 class="p-3 text-center" id="testi">What Our Members Say</h2>
      <div class="d-flex align-items-center py-5 mh-100">
        <a class="carousel-control-prev text-decoration-none" href="#mycarousel" role="button" data-bs-slide="prev">
          <div class="d-flex flex-column justify-content-center me-2 ms-auto left">
            PREV<span class="fas fa-arrow-left"></span>
          </div>
          <span class="sr-only">Previous</span>
        </a>
        <div class="container">
          <div id="mycarousel" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
              <li data-bs-target="#mycarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></li>
              <li data-bs-target="#mycarousel" data-bs-slide-to="1" aria-label="Slide 2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row">
                  <div class="col-lg-6">
                    <img src="img/test1.jpg" class="d-block w-100" alt="..." />
                  </div>
                  <div class="col-lg-6">
                    <div class="d-flex flex-column justify-content-center my-5 px-3">
                      <p class="review text-center">
                        "Joining TMC Tennis Club was the best decision I made
                        for my tennis journey. I've seen remarkable
                        improvements in my game since I became a part of this
                        wonderful club."
                      </p>
                      <div class="name d-flex align-items-center justify-content-center">
                        <span class="fas fa-minus pe-1"></span>
                        <p class="m-0">John Doe</p>
                      </div>
                      <p class="job text-center">Bachelor of Commerce</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row">
                  <div class="col-lg-6">
                    <img src="img/test2.jpg" class="d-block w-100" alt="..." />
                  </div>
                  <div class="col-lg-6">
                    <div class="d-flex flex-column justify-content-center my-5 px-3">
                      <p class="review text-center">
                        "The sense of community at TMC Tennis Club is
                        incredible. It's not just about the game; it's about
                        the people. I've made friends from all walks of life,
                        and we share a deep love for tennis."
                      </p>
                      <div class="name d-flex align-items-center justify-content-center">
                        <span class="fas fa-minus pe-1"></span>
                        <p class="m-0">Sarah Johnson</p>
                      </div>
                      <p class="job text-center">Bachelor of Business</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-next text-decoration-none" href="#mycarousel" role="button" data-bs-slide="next">
          <div class="d-flex flex-column justify-content-center right ms-2 me-auto">
            NEXT <span class="fas fa-arrow-right"></span>
          </div>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>

    <div class="container-fluid" id="Enquire">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <br />
            <h4 class="mt-3 p-3">
              We're here to assist you. If you have any questions or need more
              information, please feel free to get in touch with us.
            </h4>
            <br />
          </div>
          <div class="col-md-5 p-3 text-center">
            <p>Phone: <a href="tel:+65 67272666">+65 67272666</a></p>
            <p>
              WhatsApp:
              <a href="tel:+65 80233870">+65 80233870</a>
            </p>
            <a href="contact.php" type="button" class="btn btn-lg btn-danger mt-3 p-3">Find out more</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--ABout ENDS-->

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