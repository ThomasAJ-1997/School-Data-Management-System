<?php
session_start();
if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role'])
) {

    if ($_SESSION['role'] == 'Admin') {

        include "../db_connection.php";
        include "data/grade.php";
        $grades = allGrades($conn);
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin - Add Course</title>
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

                    <?php if ($grades == 0) { ?>

                        <div class="alert alert-info" role="alert">
                            No Grades found: Please create grade entry.
                        </div>
                    <?php } ?>

                    <a class="btn btn-dark" href="course.php">Go Back</a>

                    <?php if ($grades != 0) { ?>

                        <form method="POST" class="shadow p-3 mt-4" action="req/course-add.php">
                            <div class=" form-group form-w">
                                <h3 class="mt-1">Add New Course</h3>
                                <?php if (isset($_GET['error'])) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $_GET['error'] ?>
                                    </div>
                                <?php } ?>

                                <?php if (isset($_GET['success'])) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= $_GET['success'] ?>
                                    </div>
                                <?php } ?>

                                <label class="mt-4" for="courseCodeInput">Course Code</label>
                                <input type="text" class="form-control mt-2" id="fnameInput"
                                    name="course_code">

                                <label class="mt-4" for="courseNameInput">Course Name</label>
                                <input type="text" class="form-control mt-2" id="fnameInput"
                                    name="course_name">
                            </div>


                            <label class="mt-4" for="gradeInput">Grade</label>
                            <select name="grade" class="form-control mt-2"
                                <?php foreach ($grades as $grade) {  ?>>
                                <option value="<?= $grade['grade_id'] ?>">
                                    <?= $grade['grade_type'] . '-' . $grade['grade_code'] ?>
                                </option>
                            <?php } ?>
                            </select>

                            <button type="submit" class="btn btn-primary mt-4">Create</button>
                        </form>
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