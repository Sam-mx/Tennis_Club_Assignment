<?php
session_start();
if (!isset($_SESSION["sess_user"])) {
    header("location:home.php");
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>TMC Academy | Admin</title>
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
        // define variables to empty values  
        $nameErr = $emailErr = $mobilenoErr = $genderErr = $websiteErr = $agreeErr = "";
        $name = $email = $mobileno = $gender = $website = $agree = "";
        $EID =  $NAME = $MAIL = $GENDER = $PHNO = $EVENTNAME = $REMARKS = "";
        //Input fields validation  
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            function input_data($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

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
                //check mobile no length should not be less and greater than 11  
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
            }
        }

        //Edit
        if (isset($_POST['search'])) {
            $id1 = $_POST["edit-id"];
            $con3 = mysqli_connect('localhost', 'root', '', 'tennisclub');
            $sql2 = "SELECT * FROM event_registration WHERE id='" . $id1 . "'";
            $result2 = mysqli_query($con3, $sql2);
            $myrow = mysqli_fetch_array($result2, MYSQLI_ASSOC);


            if (!$myrow) {
                echo '<script>alert("No Such Records.")</script>';
                echo '<script>window.location="#Edit";</script>';
            } else {
                echo '<script>window.location="#edit-one";</script>';
                $EID = $myrow['id'];
                $NAME = $myrow['Name'];
                $MAIL = $myrow['Email'];
                $GENDER = $myrow['Gender'];
                $PHNO = $myrow['Phno'];
                $EVENTNAME = $myrow['Event_name'];
                $REMARKS = $myrow['Remarks'];
            }

            mysqli_close($con3);
        }

        if (isset($_POST['update'])) {
            $con4 = mysqli_connect('localhost', 'root', '', 'tennisclub');
            $EID2 = $_POST['EID'];
            $Uname = $_POST['Uname'];
            $Uemail = $_POST['Uemail'];
            $Ugender = $_POST['Ugender'];
            $Uphno = $_POST['Uphno'];
            $Uevent = $_POST['Uename'];
            $Uremark = $_POST['Uremark'];
            $sql4 = "UPDATE event_registration SET Name='$Uname',Email='$Uemail',Gender='$Ugender',Phno='$Uphno',Event_name='$Uevent',Remarks='$Uremark'   WHERE id='" . $EID2 . "'";
            if (!mysqli_query($con4, $sql4)) {
                die('ERROR:' . mysqli_error($con4));
            }
            echo '<script>alert("Your information has been updated in the database");</script>';
            mysqli_close($con4);
        }

        //Delete

        if (isset($_POST['delete'])) {
            $id = $_POST["id"];
            $con2 = mysqli_connect('localhost', 'root', '', 'tennisclub');
            $sql2 = "SELECT * FROM event_registration WHERE id='" . $id . "'";
            $sql3 = "DELETE FROM event_registration WHERE id=" . $id . "";
            $result2 = mysqli_query($con2, $sql2);
            $myrow = mysqli_fetch_array($result2, MYSQLI_ASSOC);

            if (!$myrow) {
                echo '<script>alert("No Such Records.")</script>';
            } else {
                mysqli_query($con2, $sql3);
                echo '<script>alert("Your information has been deleted from the database.")</script>';
                $con2->close();
            }
        }
        ?>
        <!-- Logo Section -->
        <header>
            <div class="Logo__Sector">
                <div class="Logo__img">
                    <a href="admin.php">
                        <img src="img/Logo.png" alt="" />
                    </a>
                </div>
            </div>

            <div class="admin">
                <div class="admin-nav">
                    <button class="tablink" onclick="openPage('View', this, 'orangered')" id="OpenView">View the registration</button>
                    <button class="tablink" onclick="openPage('Add', this, 'orangered')" id="OpenAdd">Add new registration</button>
                    <button class="tablink" onclick="openPage('Edit', this, 'orangered')" id="OpenEdit">Edit the registration</button>
                    <button class="tablink" onclick="openPage('Delete', this, 'orangered')" id="OpenDelete">Delete the registration</button>
                    <p><button class="btn btn-sm mt-3" onclick="logoutfunction()" id="logout-nav">Logout</button></p>

                </div>

                <!--View-->
                <div id="View" class="tabcontent">
                    <div class='container mt-3'>;
                        <h2 class="text-center" id="view-header">Registration Member List</h2>
                        <table class="table table-striped table-hover table-borderless text-center mt-3" id="viewTable">
                            <tr class="mt-3" id="table-header">
                                <th onclick="sortTable(0)">ID</th>
                                <th onclick="sortTable(1)">Name</th>
                                <th onclick="sortTable(2)">Email</th>
                                <th onclick="sortTable(3)">Gender</th>
                                <th onclick="sortTable(4)">Phone Number</th>
                                <th onclick="sortTable(5)">Event_Name</th>
                                <th onclick="sortTable(6)">Remarks</th>
                            </tr>
                            <?php
                            $con1 = mysqli_connect('localhost', 'root', '', 'tennisclub');
                            $sql1 = "SELECT * FROM event_registration";
                            $result = mysqli_query($con1, $sql1);
                            if ($result) {
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    echo "<tr class='p-3'>";
                                    foreach ($row as $field) {
                                        print "<td>$field</td> ";
                                    }
                                    echo "</tr>";
                                }
                            } else {
                                die("Query=$query failed!");
                            }

                            ?>
                        </table>
                    </div>

                </div>

                <div id="Add" class="tabcontent">
                    <div class="container mt-3" id="register">
                        <form class="container" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <h2 class="text-center">Add New Registrations</h2>
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
                                        <label class="form-check-label" for="male"> Male</label>
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

                <div id="Edit" class="tabcontent">
                    <div class="container mt-3" id="Edit-form">
                        <form class="container" method="post" action="">
                            <h2 class="text-center">Please enter the ID you want to edit</h2>
                            <div class="form-floating mb-3 mt-5">
                                <input type="text" class="form-control" name="edit-id" id="edit-id" placeholder="" />
                                <label for="name">ID
                                </label>
                            </div>
                            <button type="submit" class="btn btn-lg mt-3" name="search" id="search">Search Now</button>
                        </form>
                    </div>

                    <div class="container mt-3" id="register">
                        <form class="container" method="post" action="" id="edit-one">
                            <h2 class="text-center">INFORMATION</h2>
                            <div class="form-floating mb-3 mt-5">
                                <input type="hidden" class="form-control" name="EID" id="EID" placeholder="" <?php echo "value='$EID'" ?> />
                                <label for="name">ID</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="Uname" id="Uname" placeholder="" <?php echo "value='$NAME'" ?> />
                                <label for="name">Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="Uemail" id="Uemail" placeholder="" <?php echo "value='$MAIL'" ?> />
                                <label for="email">Email</label>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="radio" name="Ugender" id="male" value="Male" />
                                        <label class="form-check-label" for="male"> Male</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="radio" name="Ugender" id="radio" value="Female" />
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Female
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="Uphno" id="phno" placeholder="" <?php echo "value='$PHNO'" ?> />
                                <label for="email">Phone Number</label>
                            </div>

                            <div>
                                <select id="ename" name="Uename" class="form-select mb-3" required>
                                    <option selected <?php echo "value='$EVENTNAME'" ?>><?php echo $EVENTNAME ?></option>
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

                            <div class="form mb-3">
                                <label for="Uremark" id="edit-remark">Remarks</label>
                                <textarea type="text" class="form-control" rows="7" id="Uremark" name="Uremark" placeholder=""><?php echo $REMARKS ?></textarea>


                            </div>


                            <input id="TOS" type="checkbox" name="agree"><span id="TOS1">Agree to Terms of Service:</span>

                            <button type="submit" class="btn btn-lg mt-3" name="update">Update Now</button>
                        </form>
                    </div>

                </div>

                <div id="Delete" class="tabcontent">
                    <div class='container mt-3'>
                        <h2 class="text-center" id="view-header">Registration Member List</h2>
                        <table class="table table-striped table-hover table-borderless text-center mt-3" id="viewDTable">
                            <tr class="mt-3" id="table-header">
                                <th onclick="sortDTable(0)">ID</th>
                                <th onclick="sortDTable(1)">Name</th>
                                <th onclick="sortDTable(2)">Email</th>
                                <th onclick="sortDTable(3)">Gender</th>
                                <th onclick="sortDTable(4)">Phone Number</th>
                                <th onclick="sortDTable(5)">Event_Name</th>
                                <th onclick="sortDTable(6)">Remarks</th>
                            </tr>
                            <?php
                            $con1 = mysqli_connect('localhost', 'root', '', 'tennisclub');
                            $sql1 = "SELECT * FROM event_registration";
                            $result = mysqli_query($con1, $sql1);
                            if ($result) {
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    echo "<tr class='p-3'>";
                                    foreach ($row as $field) {
                                        print "<td>$field</td> ";
                                    }
                                    echo "</tr>";
                                }
                            } else {
                                die("Query=$query failed!");
                            }
                            ?>
                        </table>
                        <div class="container mt-3" id="Delete-form">
                            <form class="container" method="post" action="">
                                <h2 class="text-center">Deleting Information</h2>
                                <div class="form-floating mb-3 mt-5">
                                    <input type="text" class="form-control" name="id" id="id" placeholder="" />
                                    <label for="name">ID
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-lg mt-3" name="delete">Delete Now</button>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="card" id="banner">
                    <img class="card-img-top" src="img/admin-banner.jpg" height="450px" alt="" />
                    <div class="card-img-overlay">
                        <h2>Welcome, <?= $_SESSION['sess_user']; ?>!</h2>
                        <p><button class="btn btn-sm mt-3" onclick="logoutfunction()" id="logout">LOG-OUT</button></p>
                    </div>
                </div>
            </div>
        </header>
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



        <!--JS HERE -->

        <script langauge="javascript" type="text/javascript">
            //Admin
            function openPage(pageName, elmnt, color) {
                // Hide all elements with class="tabcontent" by default */
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }

                // Remove the background color of all tablinks/buttons
                tablinks = document.getElementsByClassName("tablink");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].style.backgroundColor = "";
                }

                // Show the specific tab content
                document.getElementById(pageName).style.display = "block";

                // Add the specific color to the button used to open the tab content
                elmnt.style.backgroundColor = color;
            }

            document.getElementById("OpenEdit").click();


            //logout
            function logoutfunction() {
                if (confirm('Do you want to logout?')) {
                    window.location = 'logout.php';
                } else {
                    window.location = 'admin.php';
                }
            }

            //sort table
            function sortTable(n) {
                var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
                table = document.getElementById("viewTable");
                switching = true;
                dir = "asc";
                while (switching) {
                    switching = false;
                    rows = table.rows;
                    for (i = 1; i < (rows.length - 1); i++) {
                        shouldSwitch = false;
                        x = rows[i].getElementsByTagName("TD")[n];
                        y = rows[i + 1].getElementsByTagName("TD")[n];
                        if (dir == "asc") {
                            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                                shouldSwitch = true;
                                break;
                            }
                        } else if (dir == "desc") {
                            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                                shouldSwitch = true;
                                break;
                            }
                        }
                    }
                    if (shouldSwitch) {
                        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                        switching = true;
                        switchcount++;
                    } else {
                        if (switchcount == 0 && dir == "asc") {
                            dir = "desc";
                            switching = true;
                        }
                    }
                }
            }


            //Delete Table
            //sort table
            function sortDTable(n) {
                var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
                table = document.getElementById("viewDTable");
                switching = true;
                dir = "asc";
                while (switching) {
                    switching = false;
                    rows = table.rows;
                    for (i = 1; i < (rows.length - 1); i++) {
                        shouldSwitch = false;
                        x = rows[i].getElementsByTagName("TD")[n];
                        y = rows[i + 1].getElementsByTagName("TD")[n];
                        if (dir == "asc") {
                            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                                shouldSwitch = true;
                                break;
                            }
                        } else if (dir == "desc") {
                            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                                shouldSwitch = true;
                                break;
                            }
                        }
                    }
                    if (shouldSwitch) {
                        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                        switching = true;
                        switchcount++;
                    } else {
                        if (switchcount == 0 && dir == "asc") {
                            dir = "desc";
                            switching = true;
                        }
                    }
                }
            }
        </script>
    </body>

    </html>
<?php
}
?>