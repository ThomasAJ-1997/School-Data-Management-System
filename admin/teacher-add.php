<?php
session_start();
if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role'])
) {

    if ($_SESSION['role'] == 'Admin') {

        include "../db_connection.php";
        include "data/subject.php";
        include "data/grade.php";
        include "data/section.php";
        include "data/class.php";
        $subjects = allSubjects($conn);
        $grades = allGrades($conn);
        $sections = allSections($conn);
        $classes = allClasses($conn);

        $fname = '';
        $lname = '';
        $uname = '';
        $address = '';
        $en = '';
        $pn = '';
        $qf = '';
        $email = '';
        $gender = '';

        if (isset($_GET['fname'])) $fname = $_GET['fname'];
        if (isset($_GET['lname'])) $lname = $_GET['lname'];
        if (isset($_GET['uname'])) $uname = $_GET['uname'];
        if (isset($_GET['address'])) $address = $_GET['address'];
        if (isset($_GET['en'])) $en = $_GET['en'];
        if (isset($_GET['pn'])) $pn = $_GET['pn'];
        if (isset($_GET['qf'])) $qf = $_GET['qf'];
        if (isset($_GET['email'])) $email = $_GET['email'];
        if (isset($_GET['gender'])) $gender = $_GET['gender'];

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

                    <form method="POST" class="shadow p-3 mt-4" action="req/teacher-add.php">
                        <div class=" form-group form-w">
                            <h3 class="mt-1">Add New Teacher</h3>
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
                                value="<?= $fname ?>"
                                name="fname">

                            <label class="mt-4" for="lnameInput">Last Name</label>
                            <input type="text" class="form-control mt-2" id="lnameInput"
                                value="<?= $lname ?>"
                                name="lname">

                            <label class="mt-4" for="userInput">Username</label>
                            <input type="text" class="form-control mt-2" id="userInput"
                                value="<?= $uname ?>"
                                name="username">

                            <label class="mt-4" for="passInput">Password</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control mt-2" id="passInput"
                                    name="pass">
                                <button class="btn btn-secondary mt-2" id="gBtn">Random</button>
                            </div>

                            <label class="mt-4" for="userInput">Address</label>
                            <input type="text" class="form-control mt-2" id="userInput"
                                value="<?= $address ?>"
                                name="address">

                            <label class="mt-4" for="userInput">Employee Number</label>
                            <input type="text" class="form-control mt-2" id="userInput"
                                value="<?= $en ?>"
                                name="employee_number">


                            <label class="mt-4" for="userInput">Phone Number</label>
                            <input type="text" class="form-control mt-2" id="userInput"
                                value="<?= $pn ?>"
                                name="phone_number">



                            <label class="mt-4" for="userInput">Qualification</label>
                            <input type="text" class="form-control mt-2" id="userInput"
                                value="<?= $qf ?>"
                                name="qualification">


                            <label class="mt-4" for="userInput">Email Address</label>
                            <input type="email" class="form-control mt-2" id="userInput"
                                value="<?= $email ?>"
                                name="email_address">

                            <label class="mt-4" for="userInput">Gender</label>
                            <select name="gender" value="<?= $gender ?>" id="userInput" class="form-control mt-2">
                                <option name="gender" value=""></option>
                                <option name="gender" value="Male">Male</option>
                                <option name="gender" value="Female">Female</option>
                                <option name="gender" value="Other">Other</option>
                            </select>

                            <label class="mt-4" for="userInput">Date of Birth</label>
                            <input type="date" class="form-control mt-2" id="userInput"
                                value=""
                                name="date_of_birth">

                            <label class=" mt-4" for="subjectInput">Subject</label>
                            <div class="row row-cols-5">
                                <?php foreach ($subjects as $subject): ?>
                                    <div class="col">
                                        <input type="checkbox" id="subjectInput"
                                            name="subjects[]"
                                            value="<?= $subject['subject_id'] ?>">
                                        <?= $subject['subject_type'] ?>
                                    </div>
                                <?php endforeach ?>
                            </div> <br>

                            <label class="form-label">Class</label>
                            <div class="row row-cols-5">
                                <?php foreach ($classes as $class): ?>
                                    <div class="col">
                                        <input type="checkbox"
                                            name="classes[]"
                                            value="<?= $class['class_id'] ?>">
                                        <?php
                                        $grade = getGradeById($class['grade'], $conn);
                                        $section = getSectionById($class['section'], $conn);
                                        ?>
                                        <?= $grade['grade_code'] ?><?= $grade['grade_type'] . '-' . $section['section_name'] ?>
                                    </div>
                                <?php endforeach ?>








                            </div>

                            <button type="submit" class="btn btn-primary mt-4">Add</button>
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