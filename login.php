<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to StudentCompass</title>
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



<body class="login-theme">

    <section id="login" class="login-section contact-section">
        <div class="contact-box login-box">
            <h2> Login Portal </h2>
            <form method="POST" action="includes/login.php">

                <?php if (isset($_GET['error'])) { ?>
                    <div class="alert alert-warning" role="alert">
                        <?= $_GET['error'] ?>
                    </div>
                <?php } ?>


                <div class="row1">
                    <div class="col">
                        <div class="input-box">
                            <input id="inputEmail" type="text" name="uname" required="required">
                            <span class="contact-text">Username</span>
                            <span class="line"></span>
                        </div>
                    </div>

                    <div class="col">
                        <div class="input-box">
                            <input id="inputPassword" type="password" name="pass" required="required">
                            <span class="contact-text">Password</span>
                            <span class="line"></span>
                        </div>
                    </div>

                    <div class="col">
                        <div class="input-box">
                            <label for="form-label">Login as</label>
                            <select class="form-control" name="role">
                                <option value="1">Admin</option>
                                <option value="2">Teacher</option>
                                <option value="3">Student</option>
                                <option value="4">Register Office</option>
                            </select>
                        </div>
                    </div>


                </div>

                <div class="row1">
                    <div class="col">
                        <input id="login-button" class="contact-button" type="submit" value="Login">
                        <a class="home-button" href="index.php">Home</a>
                    </div>
                </div>
            </form>
        </div>
    </section>
    </div>
    </div>
    </div>


    <!-- BOOTSTRAP -->
    <script src="js/script.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>