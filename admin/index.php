<?php
session_start();
if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role'])
) {

    if ($_SESSION['role'] == 'Admin') {



?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title> Admin - Home</title>
            <!-- BOOTSTRAP -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
            <!-- SASS/SCSS -->
            <link rel="stylesheet" href="../css/style.css">
            <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
            <!-- ICON -->
            <link rel="icon" href="../imgs/icon.png">
            <!-- JQuery -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            <script src="../js/js_nav.js"></script>

        </head>

        <body>



            <section class="dashboard-section">
                <main class="main-wrap">
                    <?php include "includes/navbar.php"; ?>

                    <section class="main-section">
                        <div class="showcase">
                            <div class="welcome">
                                <div class="img-content">
                                    <img class="admin-img" src="../imgs/icon.png" alt="Student Compass">
                                </div>
                                <div class="content-text">
                                    <h3>Welcome <?= $_SESSION['fname'] ?></h3>
                                </div>
                            </div>
                        </div>

                        <div class="container mt-2">
                            <div class="container text-center">
                                <div class="row row-cols-5">
                                    <a href="teacher.php"
                                        class="col btn btn-dark m-2 py-3">
                                        <i class="fa fa-user fs-1" aria-hidden="true"></i><br>
                                        Teachers
                                    </a>
                                    <a href="student.php" class="col btn btn-dark m-2 py-3">
                                        <i class="fa fa-graduation-cap fs-1" aria-hidden="true"></i><br>
                                        Students
                                    </a>
                                    <a href="office.php" class="col btn btn-dark m-2 py-3">
                                        <i class="fa fa-briefcase fs-1" aria-hidden="true"></i><br>
                                        Register Office
                                    </a>
                                    <a href="class.php" class="col btn btn-dark m-2 py-3">
                                        <i class="fa fa-cubes fs-1" aria-hidden="true"></i><br>
                                        Class
                                    </a>
                                    <a href="section.php" class="col btn btn-dark m-2 py-3">
                                        <i class="fa fa-address-book fs-1" aria-hidden="true"></i><br>
                                        Section
                                    </a>
                                    <a href="" class="col btn btn-dark m-2 py-3">
                                        <i class="fa fa-calendar-check-o fs-1" aria-hidden="true"></i><br>
                                        Schedule
                                    </a>
                                    <a href="" class="col btn btn-dark m-2 py-3">
                                        <i class="fa fa-book fs-1" aria-hidden="true"></i><br>
                                        Course
                                    </a>
                                    <a href="" class="col btn btn-dark m-2 py-3">
                                        <i class="fa fa-envelope fs-1" aria-hidden="true"></i><br>
                                        Message
                                    </a>
                                    <a href="" class="col btn btn-secondary m-2 py-3 col-5">
                                        <i class="fa fa-bar-chart fs-1" aria-hidden="true"></i><br>
                                        Data & Analytics
                                    </a>
                                    <a href="" class="col btn btn-secondary m-2 py-3 col-5">
                                        <i class="fa fa-desktop fs-1" aria-hidden="true"></i><br>
                                        IT Support
                                    </a>
                                    <a href="" class="col btn btn-danger m-2 py-3 col-5">
                                        <i class="fa fa-exclamation-triangle fs-1" aria-hidden="true"></i><br>
                                        Maintenance Alerts
                                    </a>
                                    <a href="" class="col btn btn-success m-2 py-3 col-5">
                                        <i class="fa fa-video-camera fs-1" aria-hidden="true"></i><br>
                                        Media & Live Recordings
                                    </a>
                                    <a href="" class="col btn btn-primary m-2 py-3 col-5">
                                        <i class="fa fa-cogs fs-1" aria-hidden="true"></i><br>
                                        Settings
                                    </a>
                                    <a href="../logout.php" class="col btn btn-warning m-2 py-3 col-5">
                                        <i class="fa fa-sign-out fs-1" aria-hidden="true"></i><br>
                                        Logout
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
            </section>


            </main>


            <!-- BOOTSTRAP -->
            <script src="js/script.js"></script>
            <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

            <script>
                $(document).ready(function() {
                    $("#navLinks li:nth-child(1) a").addClass("active");
                });
            </script>

        </body>

        </html>

<?php
    } else {
        header("Location: ../login.php");
        exit;
    }
} else {
    header("Location: ../login.php");
    exit;
}

?>