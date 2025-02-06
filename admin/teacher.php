<?php
session_start();
if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role'])
) {

    if ($_SESSION['role'] == 'Admin') {
        include "../db_connection.php";
        include "data/teacher.php";
        $teachers = allTeachers($conn);
        // print_r($teachers);




?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin - Teacher</title>
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

                if ($teachers != 0) {

                ?>

                    <div class="move-left container mt-5">
                        <a class="btn btn-dark" href="">Add New Teacher</a>

                        <div class="table-responsive">

                            <table class="table table-bordered mt-3 n-table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">ID</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Grade</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($teachers as $teacher) { ?>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td><?= $teacher['teacher_id'] ?></td>
                                            <td><?= $teacher['fname'] ?></td>
                                            <td><?= $teacher['lname'] ?></td>
                                            <td><?= $teacher['username'] ?></td>
                                            <td><?= $teacher['subject'] ?></td>
                                            <td><?= $teacher['grade'] ?></td>
                                            <td>
                                                <a href="" class="btn btn-warning">Edit</a>
                                                <a href="" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } else { ?>
                            <div class="alert-box alert alert-info .w-450 m-5" role="alert">
                                Empty: No Teacher Records to Show.
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