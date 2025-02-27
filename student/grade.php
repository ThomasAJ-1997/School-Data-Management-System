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
            <title>Student - Change Password</title>
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
                    <h4 class="mt-4">Year 2025 - Semester I</h4>
                    <div class="table-responsive">

                        <table class="table table-bordered mt-3 n-table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Course Code</th>
                                    <th scope="col">Course Title</th>
                                    <th scope="col">Grade</th>
                                    <th scope="col">Result</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <th>PHY01</th>
                                    <th>Physics 101</th>
                                    <th>Distinction</th>
                                    <th><small class="border p-1">10/10</small>&nbsp; <small class="border p-1">20/20</small>&nbsp; <small class="border p-1">15/30</small>&nbsp; <small class="border p-1">40/40</small></th>
                                    <th>75%</th>
                                </tr>
                                <tr>
                                    <td scope="row">2</th>
                                    <td>Ph01</th>
                                    <td>Physics</th>
                                    <th>Merit</th>
                                    <td><small class="border p-1">10/10</small>&nbsp; <small class="border p-1">20/20</small>&nbsp; <small class="border p-1">15/30</small>&nbsp; <small class="border p-1">40/40</small></th>
                                    <th>85</th>
                                </tr>
                                <tr>
                                    <td scope="row">3</th>
                                    <td>Ph01</th>
                                    <td>Physics</th>
                                    <th>Merit</th>
                                    <td><small class="border p-1">10/10</small>&nbsp; <small class="border p-1">20/20</small>&nbsp; <small class="border p-1">15/30</small>&nbsp; <small class="border p-1">40/40</small></th>
                                    <th>85</th>
                                </tr>
                            </tbody>
                        </table>
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
            <script src="../js/generatePass.js"></script>
            <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

            <script>
                $(document).ready(function() {
                    $("#navLinks li:nth-child(2) a").addClass("active");
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