<?php
session_start();
if (
    isset($_SESSION['student_id']) &&
    isset($_SESSION['role'])
) {

    if ($_SESSION['role'] == 'Student') {



?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title> Student - Home</title>
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
                                    <a href="grade.php"
                                        class="col btn btn-dark m-2 py-3">
                                        <i class="fa fa-star fs-1" aria-hidden="true"></i><br>
                                        Grade Summary
                                    </a>
                                    <a href="pass.php" class="col btn btn-dark m-2 py-3">
                                        <i class="fa fa-unlock-alt fs-1" aria-hidden="true"></i><br>
                                        Change Password
                                    </a>
                                    <a href="account.php" class="col btn btn-dark m-2 py-3">
                                        <i class="fa fa-archive fs-1" aria-hidden="true"></i><br>
                                        My Account
                                    </a>
                                    <a href="message.php" class="col btn btn-dark m-2 py-3">
                                        <i class="fa fa-envelope fs-1" aria-hidden="true"></i><br>
                                        Message
                                    </a>
                                    <a href="" class="col btn btn-success m-2 py-3 col-5">

                                        <i class="fa fa-book fs-1" aria-hidden="true"></i><br>
                                        Workbook
                                    </a>
                                    <a href="" class="col btn btn-secondary m-2 py-3 col-5">
                                        <i class="fa fa-desktop fs-1" aria-hidden="true"></i><br>
                                        IT Support
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