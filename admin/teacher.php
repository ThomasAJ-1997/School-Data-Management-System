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
        include "data/class.php";
        include "data/section.php";

        $teachers = allTeachers($conn);

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
                        <a class="btn btn-dark" href="teacher-add.php">Add New Teacher</a>

                        <form action="teacher-search.php" class="n-table" method="GET">
                            <div class="input-group mb-3 mt-3">
                                <input type="text"
                                    class="form-control"
                                    name="searchKey"
                                    placeholder="Search...">
                                <button class="btn btn-primary"
                                    id="gBtn">
                                    <i class="ri-search-2-line"></i></button>
                            </div>
                        </form>



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
                                        <th scope="col">ID</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Class</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0;
                                    foreach ($teachers as $teacher) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <th scope="row"><?= $i ?></th>
                                            <td><?= $teacher['teacher_id'] ?></td>
                                            <td><a href="teacher-view.php?teacher_id=<?= $teacher['teacher_id'] ?>
                                            "><?= $teacher['fname'] ?></a></td>
                                            <td><?= $teacher['lname'] ?></td>
                                            <td><?= $teacher['username'] ?></td>
                                            <td>
                                                <?php
                                                $s = '';
                                                $subjects = str_split(trim($teacher['subject_type']));

                                                foreach ($subjects as $subject) {
                                                    $s_temp = getSubjectById($subject, $conn);

                                                    if ($s_temp != 0) {
                                                        $s .= $s_temp['subject_code'] . ', ';
                                                    }
                                                }

                                                echo ' ' . $s;
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $c = '';
                                                $classes = str_split(trim($teacher['class']));
                                                foreach ($classes as $class) {
                                                    $class = getClassById($class, $conn);
                                                    $c_temp = getGradeById($class['grade'], $conn);
                                                    $section = getSectionById($class['section'], $conn);
                                                    if ($c_temp != 0)
                                                        $c .= $c_temp['grade_code'] .
                                                            $c_temp['grade_type'] . '-' . $section['section_name'] . '';
                                                }
                                                echo ' ' . $c;
                                                ?>
                                            </td>
                                            <td>
                                                <a href="teacher-edit.php?teacher_id=<?= $teacher['teacher_id'] ?>"
                                                    class="btn btn-warning">Edit</a>
                                                <a href="teacher-delete.php?teacher_id=<?= $teacher['teacher_id'] ?>"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } else { ?>
                            <div class="message-box">
                                <div class="alert-box alert alert-info .w-450 m-4" role="alert">
                                    Empty: No Teacher Records to Show.
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