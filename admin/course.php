<?php
session_start();
if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role'])
) {

    if ($_SESSION['role'] == 'Admin') {
        include "../db_connection.php";
        include "data/course.php";
        include "data/grade.php";

        $courses = allCourses($conn);


?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin - Course</title>
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

                if ($courses != 0) {

                ?>

                    <div class="move-left container mt-5">
                        <a class="btn btn-dark" href="course-add.php">Add New Course</a>

                        <?php if (isset($_GET['error'])) { ?>
                            <div class="alert alert-danger mt-2 n-table" role="alert">
                                <?= $_GET['error'] ?>
                            </div>
                        <?php } ?>

                        <?php if (isset($_GET['success'])) { ?>
                            <div class="alert alert-success mt-2 n-table" role="alert">
                                <?= $_GET['success'] ?>
                            </div>
                        <?php } ?>

                        <div class="table-responsive">

                            <table class="table table-bordered mt-3 n-table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Course Code</th>
                                        <th scope="col">Course Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0;
                                    foreach ($courses as $course) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <th scope="row"><?= $i ?></th>
                                            <td>
                                                <?php
                                                echo $course['course_code'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $course['course_name'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $grade = getGradeById($course['grade'], $conn);
                                                echo $grade['grade_code'] . '-' . $grade['grade_type'];
                                                ?>
                                            </td>
                                            <td>
                                                <a href="course-edit.php?course_id=<?= $course['course_id'] ?>"
                                                    class="btn btn-warning">Edit</a>
                                                <a href="course-delete.php?course_id=<?= $course['course_id'] ?>"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } else { ?>
                            <div class="message-box">
                                <div class="alert-box alert alert-info .w-450 m-5" role="alert">
                                    Empty: No Section Records to Show.
                                </div>
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
                            $("#navLinks li:nth-child(9) a").addClass("active");
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