<?php
session_start();
if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role']) &&
    isset($_GET['r_user_id'])
) {

    if ($_SESSION['role'] == 'Admin') {

        include "../db_connection.php";
        include "data/register-office.php";

        $r_user_id = $_GET['r_user_id'];
        $r_user = getUsersById($r_user_id, $conn);

        if ($r_user == 0) {
            header("Location: office.php");
            exit;
        }



?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin - Edit Register Office User</title>
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
                    <a class="btn btn-dark" href="office.php">Go Back</a>

                    <form method="POST" class="shadow p-3 mt-4" action="req/office-edit.php">
                        <div class=" form-group form-w">
                            <h3 class="mt-1">Edit Register Office User</h3>
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
                                value="<?= $r_user['fname'] ?>"
                                name="fname">

                            <label class="mt-4" for="lnameInput">Last Name</label>
                            <input type="text" class="form-control mt-2" id="lnameInput"
                                value="<?= $r_user['lname'] ?>"
                                name="lname">

                            <label class="mt-4" for="userInput">Username</label>
                            <input type="text" class="form-control mt-2" id="userInput"
                                value="<?= $r_user['username'] ?>"
                                name="username">

                            <label class="mt-4" for="userInput">Address</label>
                            <input type="text" class="form-control mt-2" id="userInput"
                                value="<?= $r_user['address'] ?>"
                                name="address">


                            <label class="mt-4" for="userInput">Employee Number</label>
                            <input type="text" class="form-control mt-2" id="userInput"
                                value="<?= $r_user['employee_number'] ?>"
                                name="employee_number">

                            <label class="mt-4" for="userInput">Date of Birth</label>
                            <input type="date" class="form-control mt-2" id="userInput"
                                value="<?= $r_user['date_of_birth'] ?>"
                                name="date_of_birth">



                            <label class="mt-4" for="userInput">Phone Number</label>
                            <input type="text" class="form-control mt-2" id="userInput"
                                value="<?= $r_user['phone_number'] ?>"
                                name="phone_number">


                            <label class="mt-4" for="userInput">Qualification</label>
                            <input type="text" class="form-control mt-2" id="userInput"
                                value="<?= $r_user['qualification'] ?>"
                                name="qualification">


                            <label class="mt-4" for="userInput">Gender</label>
                            <select name="gender" value="<?= $gender ?>" id="userInput" class="form-control mt-2">
                                <option name="gender" value=""></option>
                                <option name="gender" value="Male">Male</option>
                                <option name="gender" value="Female">Female</option>
                                <option name="gender" value="Other">Other</option>
                            </select>

                            <label class="mt-4" for="userInput">Email Address</label>
                            <input type="text" class="form-control mt-2" id="userInput"
                                value="<?= $r_user['email_address'] ?>"
                                name="email_address">

                            <div class="mt-3 hidden-element">
                                <input type="text"
                                    value="<?= $r_user['r_user_id'] ?>"
                                    name="r_user_id"
                                    hidden>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary mt-4">Update Record</button>
                    </form>


                    <form method="POST" class="shadow p-4 mt-4 mb-2" action="req/office-change.php" id="change_password">
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
                                    value="<?= $r_user['r_user_id'] ?>"
                                    name="r_user_id"
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
                        $("#navLinks li:nth-child(7) a").addClass("active");
                    });
                </script>


        </body>

        </html>

<?php
    } else {
        header("Location: office.php");
        exit;
    }
} else {
    header("Location: office.php");
    exit;
}

?>