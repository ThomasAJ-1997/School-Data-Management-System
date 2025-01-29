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
    <!-- ICON -->
    <link rel="icon" href="icon.png">
</head>

<body class="home-section">
    <div class="home-section-black-fill"><br /> <br>
        <div class="home-section-container">

            <nav class="navbar navbar-expand-lg bg-light" id="navHome">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="icon.png" width="50" alt="ICON">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#about">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#contact">Contact</a>
                            </li>
                        </ul>

                        <ul class="navbar-nav me-right mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Login</a>
                            </li>
                        </ul>
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
                    <div class="card mb-3 card-1">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="icon.png" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">About</h5>
                                    <p class="card-text">
                                        A student data management systema software platform that collects, stores, and analyses student data to provide deeper insights into student learning patterns, identify areas of improvement, and enable personalized learning experiences by automatically generating tailored interventions and recommendations for teachers and students, ultimately leading to more informed decision-making in education.
                                    </p>
                                    <p class="card-text"><small class="text-body-secondary">Student Compass</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>

    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>