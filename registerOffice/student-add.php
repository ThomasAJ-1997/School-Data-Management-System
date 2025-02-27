<?php
session_start();
if (
    isset($_SESSION['r_user_id']) &&
    isset($_SESSION['role'])
) {

    if ($_SESSION['role'] == 'Register Office') {

        include "../db_connection.php";
        include "data/grade.php";
        include "data/section.php";
        $grades = allGrades($conn);
        $sections = allSections($conn);


        $fname = '';
        $lname = '';
        $uname = '';
        $address = '';
        $email = '';
        $pfn = '';
        $pln = '';
        $ppn = '';

        if (isset($_GET['fname'])) $fname = $_GET['fname'];
        if (isset($_GET['lname'])) $lname = $_GET['lname'];
        if (isset($_GET['uname'])) $uname = $_GET['uname'];
        if (isset($_GET['uname'])) $address = $_GET['address'];
        if (isset($_GET['uname'])) $email = $_GET['email_address'];
        if (isset($_GET['uname'])) $pfn = $_GET['parent_fname'];
        if (isset($_GET['uname'])) $pln = $_GET['parent_lname'];
        if (isset($_GET['uname'])) $ppn = $_GET['parent_phone_number'];

?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Register Office - Add Student</title>
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

                    <form method="POST" class="shadow p-3 mt-4" action="req/student-add.php">
                        <div class=" form-group form-w">
                            <h3 class="mt-1">Add New Student</h3>
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

                            <label class="mt-4" for="userInput">Email Address</label>
                            <input type="email" class="form-control mt-2" id="userInput"
                                value="<?= $email ?>"
                                name="email_address">

                            <label class="mt-4" for="userInput">Date Of Birth</label>
                            <input type="date" class="form-control mt-2" id="userInput"
                                name="date_of_birth">


                            <label class="mt-4" for="userInput">Gender</label>
                            <select name="gender" id="userInput" class="form-control mt-2">
                                <option name="gender" value=""></option>
                                <option name="gender" value="Male">Male</option>
                                <option name="gender" value="Female">Female</option>
                                <option name="gender" value="Other">Other</option>
                            </select>
                            <br>
                            <hr>

                            <label class="mt-4" for="userInput">Parent First Name</label>
                            <input type="text" class="form-control mt-2" id="userInput"
                                value="<?= $pfn ?>"
                                name="parent_fname">

                            <label class="mt-4" for="userInput">Parent Last Name</label>
                            <input type="text" class="form-control mt-2" id="userInput"
                                value="<?= $pln ?>"
                                name="parent_lname">


                            <label class="mt-4" for="userInput">Parent Phone Number</label>
                            <input type="text" class="form-control mt-2" id="userInput"
                                value="<?= $ppn ?>"
                                name="parent_phone_number">

                            <br>
                            <hr>



                            <label class="mt-4" for="gradeInput">Grade</label>
                            <div class="row row-cols-5">
                                <?php foreach ($grades as $grade): ?>
                                    <div class="col">
                                        <input type="radio"
                                            name="grade"
                                            value="<?= $grade['grade_type'] ?>">
                                        <?= $grade['grade_type'] ?>-<?= $grade['grade_code'] ?>
                                    </div>
                                <?php endforeach ?>
                            </div>

                            <label class=" mt-4" for="sectionInput">Section</label>
                            <div class="row row-cols-5">
                                <?php foreach ($sections as $section): ?>
                                    <div class="col">
                                        <input type="checkbox" id="sectionInput"
                                            name="sections[]"
                                            value="<?= $section['section_id'] ?>">
                                        <?= $section['section_name'] ?>
                                    </div>
                                <?php endforeach ?>
                            </div>


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