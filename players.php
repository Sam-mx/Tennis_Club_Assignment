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



    <!-- Player Starts-->
    <div class="players">
        <div class="card" id="banner">
            <img class="card-img-top" src="img/player-banner.png" alt="" height="450px" />
            <div class="card-img-overlay">
                <h2>Players</h2>
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
                            Players
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container mt-3">
            <h1 id="player-header" class="text-center">PLAYERS</h1>
            <hr>
            <h2 class="text-center">PROFILES</h2><br>
            <div id="myBtnContainer" class="text-center">
                <button class="btn active" onclick="filterSelection('all')"> Show all</button>
                <button class="btn" onclick="filterSelection('Men')"> Men</button>
                <button class="btn" onclick="filterSelection('Women')"> Women</button>
            </div>

            <!-- Portfolio Gallery Grid -->
            <div class="row">
                <div class="column Men">
                    <div class="content">
                        <img src="img/player1.jpg" alt="" style="width:100%">
                        <h4 id="player-header">John Snow</h4>
                        <h6>Age : 22</h6>
                        <h6>Notable Achievements : <i class='fa fa-medal'></i> Multiple regional championships, ranked top 50 nationally.</h6>
                    </div>
                </div>
                <div class="column Women">
                    <div class="content">
                        <img src="img/player2.jpg" alt="" style="width:100%">
                        <h4 id="player-header">Sarah Johnson</h4>
                        <h6>Age : 21</h6>
                        <h6>Notable Achievements : <i class='fa fa-medal'></i> Junior Wimbledon finalist, women's singles champion at the club tournament.</h6>
                    </div>
                </div>
                <div class="column Men">
                    <div class="content">
                        <img src="img/player3.jpg" alt="" style="width:100%">
                        <h4 id="player-header">Michael Brown</h4>
                        <h6>Age : 24</h6>
                        <h6>Notable Achievements : <i class='fa fa-medal'></i> Gold medalist in men's doubles at the National Tennis Championships.</h6>
                    </div>
                </div>

                <div class="column Men">
                    <div class="content">
                        <img src="img/player4.jpg" alt="" style="width:100%">
                        <h4 id="player-header">Daniel Smithson</h4>
                        <h6>Age : 31</h6>
                        <h6>Notable Achievements : <i class='fa fa-medal'></i> Former national junior champion, consistently ranked in the top 20 for men's doubles.</h6>
                    </div>
                </div>
                <div class="column Women">
                    <div class="content">
                        <img src="img/player5.jpg" alt="" style="width:100%">
                        <h4 id="player-header">Emily Davis</h4>
                        <h6>Age : 22</h6>
                        <h6>Notable Achievements : <i class='fa fa-medal'></i> Represented the club in national interclub competitions, known for her powerful forehand.</h6>
                    </div>
                </div>
                <div class="column Men">
                    <div class="content">
                        <img src="img/player6.jpg" alt="" style="width:100%">
                        <h4 id="player-header">James Anderson</h4>
                        <h6>Age : 28</h6>
                        <h6>Notable Achievements : <i class='fa fa-medal'></i> Winner of multiple local tournaments, known for his powerful serve and aggressive playstyle.</h6>
                    </div>
                </div>

                <div class="column Women">
                    <div class="content">
                        <img src="img/player7.jpg" alt="" style="width:100%">
                        <h4 id="player-header">Lisa Adams</h4>
                        <h6>Age : 20</h6>
                        <h6>Notable Achievements : <i class='fa fa-medal'></i> Youngest player to win the club's mixed doubles tournament.</h6>
                    </div>
                </div>
                <div class="column Men">
                    <div class="content">
                        <img src="img/player8.jpg" alt="" style="width:100%">
                        <h4 id="player-header">William Turner</h4>
                        <h6>Age : 24</h6>
                        <h6>Notable Achievements : <i class='fa fa-medal'></i> Consistent top-10 ranking in men's doubles, captain of the club's doubles team.</h6>
                    </div>
                </div>
                <div class="column Men">
                    <div class="content">
                        <img src="img/player9.jpg" alt="" style="width:100%">
                        <h4 id="player-header">Brandon Stark</h4>
                        <h6>Age : 21</h6>
                        <h6>Notable Achievements : <i class='fa fa-medal'></i> Two-time club champion, winner of the men's singles division at the regional championships.</h6>
                    </div>
                </div>
                <!-- END GRID -->
            </div>
        </div>
    </div>
    <!--Player Ends-->
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