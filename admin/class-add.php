<?php
session_start();
if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role'])
) {

    if ($_SESSION['role'] == 'Admin') {
        include "../db_connection.php";
        include 'data/grade.php';
        include 'data/section.php';
        $grades = allGrades($conn);
        $sections = allSections($conn);

?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin - Add Class</title>
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

                    <?php if ($sections == 0 || $grades == 0) { ?>

                        <div class="alert alert-info" role="alert">
                            First create section and class
                        </div>
                        <a href="class.php"
                            class="btn btn-dark">Go Back</a>
                    <?php } ?>

                    <?php if ($sections != 0 || $grades != 0) { ?>

                        <form method="POST" class="shadow p-3 mt-4" action="req/class-add.php">
                            <div class=" form-group form-w">
                                <h3 class="mt-1">Add New Class</h3>
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

                                <label class="mt-4" for="gradeInput">Grade</label>
                                <select name="grade_type" class="form-control mt-2"
                                    <?php foreach ($grades as $grade) {  ?>>
                                    <option value="<?= $grade['grade_id'] ?>">
                                        <?= $grade['grade_type'] . '-' . $grade['grade_code'] ?>
                                    </option>
                                <?php } ?>
                                </select>

                                <label class="mt-4" for="sectionInput">Section</label>
                                <select name="section_name" class="form-control mt-2">
                                    <?php foreach ($sections as $section) {  ?>>
                                    <option value="<?= $section['section_id'] ?>">
                                        <?= $section['section_name'] ?>
                                    </option>
                                <?php } ?>
                                </select>

                            </div>

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
                        $("#navLinks li:nth-child(6) a").addClass("active");
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