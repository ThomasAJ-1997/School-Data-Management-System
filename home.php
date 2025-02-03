<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['role'])) {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login - StudentCompass</title>
        <!-- BOOTSTRAP -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <!-- SASS/SCSS -->
        <link rel="stylesheet" href="css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
            rel="stylesheet">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <!-- ICON -->
        <link rel="icon" href="icon.png">

    </head>

    <body class="dashboard-section">
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="shadow w-450 p-3 text-center">
                <small>Role:
                    <b>
                        <?php
                        if ($_SESSION['role'] == 'Admin') {
                            echo "Admin";
                        } else if ($_SESSION['role'] == 'Teacher') {
                            echo "Teacher";
                        } else {
                            echo "Student";
                        }
                        ?>
                    </b><br>
                    <h3 class="display-4"><?= $_SESSION['fname'] ?></h3>
                    <a href="logout.php" class="btn btn-warning">Logout</a>
                </small>
            </div>
        </div>


        <!-- BOOTSTRAP -->
        <script src="js/script.js"></script>
        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>

<?php } else {
    header("Location: ../login.php");
    exit;
} ?>