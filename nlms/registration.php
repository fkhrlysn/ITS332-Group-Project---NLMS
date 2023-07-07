<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Registration Form</title>
    
    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/register.css" rel="stylesheet" media="all">
    
    
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
    <div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body">
                <h2 class="title">Registration Form</h2>
                <form action="includes/signup.inc.php" method="POST">
                    <div class="input-group">
                        <label class="label">Name</label>
                        <input class="input--style-4" type="text" name="name" required>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Staff ID</label>
                                <input class="input--style-4" type="text" name="staffid" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Password</label>
                                <input class="input--style-4" type="password" name="password" required>
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Phone Number</label>
                                <input class="input--style-4" type="text" name="phone" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Email</label>
                                <input class="input--style-4" type="email" name="email" required>
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Salary</label>
                                <input class="input--style-4" type="text" name="salary" placeholder="RM" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Position</label>
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select name="position">
                                        <option disabled="disabled" selected="selected">Choose option</option>
                                        <option value="manager" >Manager</option>
                                        <option value="staff">Staff</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        if(isset($_GET['error'])) {
                            if($_GET['error'] == "emptyfields") {
                                echo '<p>Required fields are empty!<p>';
                            }
                            else if($_GET['error'] == "invalidemailid") {
                                echo '<p>Invalid email and id!<p>';
                            }
                            else if($_GET['error'] == "invalidemail") {
                                echo '<p>Invalid email!<p>';
                            }
                            else if($_GET['error'] == "invalidid") {
                                echo '<p>Invalid id!<p>';
                            }
                            // else if($_GET['error'] == "passwordcheck") {
                            //     echo '<p>Invalid password!<p>';
                            // }
                            else if($_GET['error'] == "idtaken") {
                                echo '<p>Username already taken!<p>';
                            }
                        } 
                        else if(isset($_GET['signup'])) {
                            if ($_GET['signup'] == "success")
                            { echo '<p>Signup successful!<p>'; }
                        }
                    ?>
                    <div class="p-t-15">
                        <button class="btn btn-primary btn--blue" type="submit" name="signup-submit">Submit</button>
                        <a href="home.php" class="btn btn-primary btn--blue">Home</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->