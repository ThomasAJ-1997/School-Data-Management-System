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
    <!-- ICON -->
    <link rel="icon" href="icon.png">

</head>

<body class="home-section">
    <div class="home-section-black-fill"><br /> <br>
        <div class="home-section-container">
            <nav>
                <a href="#" class="logo">Student Compass</a>

                <ul class="navbar">
                    <li><a href="#" class="active">Home</a></li>
                    <li><a href="#" class="active">About</a></li>
                    <li><a href="#" class="active">Service</a></li>
                    <li><a href="#" class="active">Contact</a></li>
                </ul>

                <div class="main">
                    <a href="#" class="user"><i class="ri-user-fill"></i>Sign In</a>
                    <a href="#">Register</a>
                    <div class="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>




                </div>
            </nav>
            <div>
                <section class="welcome-text d-flex justify-content-center align-items-center flex-column">
                    <img src="icon.png" alt="ICON Student Compass">
                    <h4> Welcome to Student Compass </h4>
                    <p>Student Data Management System designed for you in mind</p>
                </section>

                <section id="about" class="welcome-text d-flex justify-content-center align-items-center flex-column">

                </section>

                <section id="contact" class="welcome-text d-flex justify-content-center align-items-center flex-column">

                </section>
            </div>
        </div>
    </div>

    <!-- BOOTSTRAP -->
    <script src="js/script.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

<script>
    const hamMenu = document.querySelector(".hamburger");
    const navMenuPopUp = document.querySelector(".navbar");

    hamMenu.addEventListener("click", () => {
        hamMenu.classList.toggle("active");
        navMenuPopUp.classList.toggle("active");
    });
</script>

</html>