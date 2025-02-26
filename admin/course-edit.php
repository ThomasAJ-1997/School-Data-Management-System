<?php
session_start();
if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role']) &&
    isset($_GET['course_id'])
) {

    if ($_SESSION['role'] == 'Admin') {

        include "../db_connection.php";
        include "data/course.php";
        include "data/grade.php";

        $courses = allCourses($conn);
        $grades = allGrades($conn);
        $course_id = $_GET['course_id'];
        $course = getCourseById($course_id, $conn);

        if ($course == 0) {
            header("Location: course.php");
            exit;
        }



?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin - Edit Course</title>
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
                    <a class="btn btn-dark" href="course.php">Go Back</a>

                    <form method="POST" class="shadow p-3 mt-4" action="req/course-edit.php">
                        <div class=" form-group form-w">
                            <h3 class="mt-1">Edit Course</h3>
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
                                name="course_code"
                                value="<?= $course['course_code'] ?>">

                            <label class="mt-4" for="courseNameInput">Course Name</label>
                            <input type="text" class="form-control mt-2" id="fnameInput"
                                name="course_name"
                                value="<?= $course['course_name'] ?>">
                        </div>


                        <label class="mt-4" for="gradeInput">Grade</label>
                        <select name="grade" class="form-control mt-2"
                            <?php foreach ($grades as $grade) {
                                $selected = 0;
                                if ($grade['grade_id'] == $class['class_id']) {
                                    $selected = 1;
                                } ?>>
                            <option selected value="<?= $grade['grade_id'] ?>"
                                <?php if ($selected) echo "selected" ?>>
                                <?= $grade['grade_type'] . '-' . $grade['grade_code'] ?>
                            </option>
                        <?php } ?>
                        </select>


                        <input type="text"
                            class="form-control"
                            value="<?= $course['course_id'] ?>"
                            name="course_id"
                            hidden>


                        <button type="submit" class="btn btn-primary mt-4">Edit Course</button>
                    </form>



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
        header("Location: course3.php");
        exit;
    }
} else {
    header("Location: course3.php");
    exit;
}

?>