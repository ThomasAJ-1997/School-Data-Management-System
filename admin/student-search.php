<?php
session_start();
if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role'])
) {

    if ($_SESSION['role'] == 'Admin') {
        if (isset($_GET['searchKey'])) {

            $search_key = $_GET['searchKey'];
            include "../db_connection.php";
            include "data/student.php";
            include "data/grade.php";
            $students = searchStudent($search_key, $conn);



?>

            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Admin - Search Students</title>
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

                    if ($students != 0) {

                    ?>

                        <div class="move-left container mt-5">
                            <a class="btn btn-dark" href="student-add.php">Add New Student</a>
                            <a class="btn btn-dark" href="student.php">Go Back</a>


                            <form action="student-search.php" class="n-table" method="GET">
                                <div class="input-group mb-3 mt-3 ">
                                    <input type="text"
                                        class="form-control"
                                        name="searchKey"
                                        value="<?= $search_key ?>"
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
                                            <th scope="col">Grade</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0;
                                        foreach ($students as $student) {
                                            $i++;
                                        ?>
                                            <tr>
                                                <th scope="row"><?= $i ?></th>
                                                <td><?= $student['student_id'] ?></td>
                                                <td><a href="student-view.php?student_id=<?= $student['student_id'] ?>"><?= $student['fname'] ?></a>
                                                <td><?= $student['lname'] ?></td>
                                                <td><?= $student['username'] ?></td>
                                                <td><?= $student['grade_type'] ?></td>
                                                <td>
                                                    <a href="student-edit.php?student_id=<?= $student['student_id'] ?>"
                                                        class="btn btn-warning">Edit</a>
                                                    <a href="student-delete.php?student_id=<?= $student['student_id'] ?>"
                                                        class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            <?php } else { ?>
                                <div class="search-container">
                                    <div class="alert-box alert alert-info m-5" role="alert">
                                        Empty: No Student Records to Show.
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
                                $("#navLinks li:nth-child(3) a").addClass("active");
                            });
                        </script>


            </body>

            </html>

<?php
        } else {
            header("Location: student.php");
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