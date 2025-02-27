<?php
session_start();
if (
    isset($_SESSION['student_id']) &&
    isset($_SESSION['role'])
) {

    if ($_SESSION['role'] == 'Student') {
        include "../db_connection.php";


?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Student - Grade Summary</title>
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

        </head>

        <body>




            <main class="main-wrap">
                <?php include "includes/navbar.php";

                ?>

                <div class="move-left container mt-5">
                    <a class="btn btn-dark" href="index.php">Go Back</a>

                    <form method="POST" class="shadow p-4 mt-4 mb-2" action="req/student-change.php" id="change_password">
                        <h3 class="mt-1">Change Password</h3>
                        <?php if (isset($_GET['perror'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $_GET['perror'] ?>
                            </div>
                        <?php } ?>

                        <?php if (isset($_GET['psuccess'])) { ?>
                            <div class="alert alert-success" role="alert">
                                <?= $_GET['psuccess'] ?>
                            </div>
                        <?php } ?>


                        <div class="mb-3">
                            <div class="mb-3">
                                <label class="form-label">Old Password</label>
                                <input type="password"
                                    class="form-control"
                                    name="old_pass">
                            </div>

                            <label class="form-label">New password </label>
                            <div class="input-group mb-3">
                                <input type="text"
                                    class="form-control"
                                    name="new_pass"
                                    id="passInput">
                                <button class="btn btn-secondary"
                                    id="gBtn">
                                    Random</button>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Confirm new password </label>
                                <input type="text"
                                    class="form-control"
                                    name="c_new_pass"
                                    id="passInput2">
                            </div>
                            <button type="submit"
                                class="btn btn-primary">
                                Change Password</button>

                    </form>
                </div>
                </div>



            <?php } else { ?>
                <div class="alert-box alert alert-info .w-450 m-5" role="alert">
                    Error: 404 - Record Unknown.
                </div>
            <?php } ?>

            </div>
            </div>


            <!-- BOOTSTRAP -->
            <script src="js/script.js"></script>
            <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

            <script>
                $(document).ready(function() {
                    $("#navLinks li:nth-child(3) a").addClass("active");
                });
            </script>


        </body>

        </html>

    <?php
} else {
    header("Location: index.php");
    exit;
}


    ?>