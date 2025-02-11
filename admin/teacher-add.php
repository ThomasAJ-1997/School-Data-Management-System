<?php
session_start();
if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role'])
) {

    if ($_SESSION['role'] == 'Admin') {
        include "../db_connection.php";
        include "data/teacher.php";
        include "data/subject.php";
        include "data/grade.php";

        $teachers = allTeachers($conn);


        // print_r($subjects);
        // echo "<pre>";
        // print_r($subjects);
        // echo "</pre>";

?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin - Add Teacher</title>
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
                    <a class="btn btn-dark" href="teacher.php">Go Back</a>

                    <form method="POST" class="shadow p-3 mt-4" action="">
                        <div class=" form-group form-w">
                            <h3 class="mt-3">Add New User</h3>

                            <label class="mt-4" for="exampleInputEmail1">First Name</label>
                            <input type="text" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter First Name"
                                name="fname">

                            <label class="mt-4" for="exampleInputEmail1">Last Name</label>
                            <input type="text" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Surname"
                                name="lname">

                        </div>

                        <button type="submit" class="btn btn-primary mt-4">Add</button>
                    </form>



                </div>
                </div>


                <!-- BOOTSTRAP -->
                <script src="js/script.js"></script>
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
        header("Location: ../login.php");
        exit;
    }
} else {
    header("Location: ../login.php");
    exit;
}

?>