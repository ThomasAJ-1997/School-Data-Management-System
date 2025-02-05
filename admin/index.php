<?php
session_start();
if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role'])
) {

    if ($_SESSION['role'] == 'Admin') {



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
            <link rel="stylesheet" href="../css/style.css">
            <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
                rel="stylesheet">
            <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
            <!-- ICON -->
            <link rel="icon" href="../imgs/icon.png">

        </head>

        <body>
            <main class="main-wrap">
                <header class="main-head">
                    <div class="main-nav">
                        <nav class="dashboard-navbar">
                            <div class="navbar-nav">
                                <ul class="nav-list">
                                    <li class="nav-list-item">
                                        <a href="#" class="nav-link">
                                            <i class="ri-dashboard-horizontal-fill"></i>
                                            <span class="link-text">Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="nav-list-item">
                                        <a href="#" class="nav-link">
                                            <i class="ri-account-box-fill"></i>
                                            <span class="link-text">Teacher</span>
                                        </a>
                                    </li>
                                    <li class="nav-list-item">
                                        <a href="#" class="nav-link">
                                            <i class="ri-group-fill"></i>
                                            <span class="link-text">Student</span>
                                        </a>
                                    </li>
                                    <li class="nav-list-item">
                                        <a href="#" class="nav-link">
                                            <i class="ri-profile-fill"></i>
                                            <span class="link-text">Office </span>
                                        </a>
                                    </li>
                                    <li class="nav-list-item">
                                        <a href="#" class="nav-link">
                                            <i class="ri-file-user-fill"></i>
                                            <span class="link-text">Class</span>
                                        </a>
                                    </li>
                                    <li class="nav-list-item">
                                        <a href="#" class="nav-link">
                                            <i class="ri-school-fill"></i>
                                            <span class="link-text">Section</span>
                                        </a>
                                    </li>
                                    <li class="nav-list-item">
                                        <a href="#" class="nav-link">
                                            <i class="ri-calendar-check-fill"></i>
                                            <span class="link-text">Schedule</span>
                                        </a>
                                    </li>

                                    <li class="nav-list-item">
                                        <a href="#" class="nav-link">
                                            <i class="ri-presentation-fill"></i>
                                            <span class="link-text">Course</span>
                                        </a>
                                    </li>
                                    <li class="nav-list-item">
                                        <a href="#" class="nav-link">
                                            <i class="ri-mail-fill"></i>
                                            <span class="link-text">Messages</span>
                                        </a>
                                    </li>
                                    <li class="nav-list-item">
                                        <a href="#" class="nav-link">
                                            <i class="ri-settings-3-fill"></i>
                                            <span class="link-text">Settings</span>
                                        </a>
                                    </li>
                                    <li class="nav-list-item">
                                        <a href="#" class="nav-link">
                                            <i class="ri-logout-box-line"></i>Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </header>
                <section class="showcase">
                    <div class="welcome">
                        <div class="img-content">
                            <img class="admin-img" src="../imgs/icon.png" alt="Student Compass">
                        </div>
                        <div class="content-text">
                            <h3>Welcome <?= $_SESSION['fname'] ?></h3>
                        </div>
                    </div>
                </section>

            </main>



            <!-- BOOTSTRAP -->
            <script src="js/script.js"></script>
            <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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