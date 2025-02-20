<?php
session_start();
if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role'])
) {

    if ($_SESSION['role'] == 'Admin') {
        include "../db_connection.php";
        include "data/teacher.php";
        include "data/grade.php";
        include "data/subject.php";
        include "data/section.php";

        if (isset($_GET['teacher_id'])) {

            $teacher_id = $_GET['teacher_id'];
            $teacher = getTeachertById($teacher_id, $conn);
            $subject = getSubjectById($teacher_id, $conn);
            $grade = getGradeById($teacher_id, $conn);
            $sections = getSectionById($teacher_id, $conn);

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

                    if ($teacher != 0) {

                    ?>

                        <div class="move-left container mt-5">
                            <div class="card" style="width: 28rem;">
                                <img src="../imgs/<?= $teacher['gender'] ?>.png" class="card-img-top" alt="..." style="width: 20rem; margin-left: 4rem; margin-top: 2rem;">
                                <div class="card-body">
                                    <h5 class="card-title" style="text-align: center;">@<?php echo $teacher['username']; ?></h5>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <b>First Name: </b> <?php echo $teacher['fname']; ?>
                                    </li>
                                    <li class="list-group-item"><b>Last Name: </b><?php echo $teacher['lname']; ?></li>
                                    <li class="list-group-item"><b>Username: </b><?php echo $teacher['username']; ?></li>
                                    <li class="list-group-item"><b>Address:</b> <?php echo $teacher['address']; ?></li>
                                    <li class="list-group-item"><b>Employee Number:</b> <?php echo $teacher['employee_number']; ?></li>
                                    <li class="list-group-item"><b>DOB: </b><?php echo $teacher['date_of_birth']; ?></li>
                                    <li class="list-group-item"><b>Phone Number:</b> <?php echo $teacher['phone_number']; ?></li>
                                    <li class="list-group-item"><b>Qualification:</b> <?php echo $teacher['qualification']; ?></li>
                                    <li class="list-group-item"><b>Gender</b> <?php echo $teacher['gender']; ?></li>
                                    <li class="list-group-item"><b>Email Address:</b> <?php echo $teacher['email_address']; ?></li>
                                    <li class="list-group-item"><b>Date Joined:</b> <?php echo $teacher['date_of_joined']; ?></li>
                                    <li class="list-group-item"><b>Subject:</b>

                                        <?php
                                        $s = '';
                                        $subjects = str_split(trim($teacher['subject_type']));

                                        foreach ($subjects as $subject) {
                                            $s_temp = getSubjectById($subject, $conn);

                                            if ($s_temp != 0) {
                                                $s .= $s_temp['subject_code'] . ', ';
                                            }
                                        }

                                        echo ' ' .  $s;
                                        ?>
                                    </li>
                                    <li class="list-group-item"><b>Grade:</b>
                                        <?php
                                        $g = '';
                                        $grades = str_split(trim($teacher['grade_type']));
                                        foreach ($grades as $grade) {
                                            $g_temp = getGradeById($grade, $conn);
                                            if ($g_temp != 0)
                                                $g .= $g_temp['grade_code'] . '-' .
                                                    $g_temp['grade_type'] . ', ';
                                        }
                                        echo ' ' . $g;
                                        ?>
                                    </li>


                                </ul>
                                <div class="card-body">
                                    <a href="teacher.php" class="card-link">Go back</a>
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
                                $("#navLinks li:nth-child(2) a").addClass("active");
                            });
                        </script>


            </body>

            </html>

<?php
        } else {
            header("Location: teacher.php");
            exit;
        }
    } else {
        header("Location: ../login.php");
        exit;
    }
} else {
    header("Location: ../login.php");
    exit;
}

?>