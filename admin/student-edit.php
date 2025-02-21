<?php
session_start();
if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role']) &&
    isset($_GET['student_id'])
) {

    if ($_SESSION['role'] == 'Admin') {

        include "../db_connection.php";
        include "data/subject.php";
        include "data/grade.php";
        include "data/student.php";
        include "data/section.php";

        $subjects = allSubjects($conn);
        $grades = allGrades($conn);
        $sections = allSections($conn);

        $student_id = $_GET['student_id'];
        $student = getStudentById($student_id, $conn);

        if ($student == 0) {
            header("Location: student.php");
            exit;
        }



?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin - Edit Student</title>
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
                    <a class="btn btn-dark" href="student.php">Go Back</a>

                    <form method="POST" class="shadow p-3 mt-4" action="req/student-edit.php">
                        <div class=" form-group form-w">
                            <h3 class="mt-1">Edit Student Information</h3>
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

                            <label class="mt-4" for="fnameInput">First Name</label>
                            <input type="text" class="form-control mt-2" id="fnameInput"
                                value="<?= $student['fname'] ?>"
                                name="fname">

                            <label class="mt-4" for="lnameInput">Last Name</label>
                            <input type="text" class="form-control mt-2" id="lnameInput"
                                value="<?= $student['lname'] ?>"
                                name="lname">

                            <label class="mt-4" for="userInput">Username</label>
                            <input type="text" class="form-control mt-2" id="userInput"
                                value="<?= $student['username'] ?>"
                                name="username">

                            <div class="mt-3 hidden-element">
                                <input type="text"
                                    value="<?= $student['student_id'] ?>"
                                    name="student_id"
                                    hidden>
                            </div>

                            <label class="form-label mt-2">Address</label>
                            <input type="text"
                                class="form-control"
                                value="<?= $student['address'] ?>"
                                name="address">

                            <label class="form-label mt-4">Email Address</label>
                            <input type="email"
                                class="form-control"
                                value="<?= $student['email_address'] ?>"
                                name="email_address">

                            <label class="mt-4" for="userInput">Gender</label>
                            <select name="gender" value="<?= $gender ?>" id="userInput" class="form-control mt-2">
                                <option name="gender" value=""></option>
                                <option name="gender" value="Male">Male</option>
                                <option name="gender" value="Female">Female</option>
                                <option name="gender" value="Other">Other</option>
                            </select>


                            <label class="form-label mt-4">Date of Birth</label>
                            <input type="date"
                                class="form-control"
                                value="<?= $student['date_of_birth'] ?>"
                                name="date_of_birth">

                            <label class="form-label mt-4">Parent First Name</label>
                            <input type="text"
                                class="form-control"
                                value="<?= $student['parent_fname'] ?>"
                                name="parent_fname">

                            <label class="form-label mt-4">Parent Last Name</label>
                            <input type="text"
                                class="form-control"
                                value="<?= $student['parent_lname'] ?>"
                                name="parent_lname">

                            <label class="form-label mt-4">Parent Phone Number</label>
                            <input type="text"
                                class="form-control"
                                value="<?= $student['parent_phone_number'] ?>"
                                name="parent_phone_number">
                            <br>
                            <hr>

                            <label class="mt-4" for="gradeInput">Grade</label>
                            <div class="row row-cols-5">
                                <?php
                                $grades_ids = str_split(trim($student['grade_type']));
                                foreach ($grades as $grade) {
                                    $checked = 0;
                                    foreach ($grades_ids as $grades_id) {
                                        $grades_id == $grade['grade_id'];
                                    }
                                ?>
                                    <div class="col">
                                        <input type="radio"
                                            name="grade"
                                            checked
                                            value="<?= $grade['grade_type'] ?>">
                                        <?= $grade['grade_code'] ?><?= $grade['grade_type'] ?>
                                    </div>
                                <?php } ?>
                            </div><br>

                            <label class=" mt-4" for="sectionInput">Section</label>
                            <div class="row row-cols-5">
                                <?php foreach ($sections as $section): ?>
                                    <div class="col">
                                        <input type="radio" id="sectionInput"
                                            name="section"
                                            value="<?= $section['section_id'] ?>">
                                        <?= $section['section_name'] ?>
                                    </div>
                                <?php endforeach ?>
                            </div>

                        </div><br>




                        <button type="submit" class="btn btn-primary mt-4">Update Record</button>
                    </form>


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
                                <label class="form-label">Admin password</label>
                                <input type="password"
                                    class="form-control"
                                    name="admin_pass">
                            </div>

                            <div class="mt-3 hidden-element">
                                <input type="text"
                                    value="<?= $student['student_id'] ?>"
                                    name="student_id"
                                    hidden>
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


                <!-- BOOTSTRAP -->
                <script src="js/script.js"></script>
                <script src="../js/generatePass.js"></script>
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
        header("Location: teacher.php");
        exit;
    }
} else {
    header("Location: teacher.php");
    exit;
}

?>