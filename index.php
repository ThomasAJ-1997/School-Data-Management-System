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

<body class="home-section">
    <div class="home-section-black-fill"><br /> <br>
        <div class="home-section-container">
            <nav class="nav-glass">
                <a href="#" class="logo">Student Compass</a>

                <ul class="navbar">
                    <li><a href="#home" class="nav-links active">Home</a></li>
                    <li><a href="#about" class="nav-links active">About</a></li>
                    <li><a href="#service" class="nav-links active">Services</a></li>
                    <li><a href="#contact" class="nav-links active">Contact</a></li>
                </ul>

                <div class="main">
                    <a href="login.php" class="sign-in user"><i class="ri-user-fill"></i>Sign In</a>
                    <div class="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </nav>
            <div>

                <section id="home" class="welcome-text d-flex justify-content-center align-items-center flex-column">
                    <img src="imgs/icon.png" alt="ICON Student Compass">
                    <h4> Welcome to Student Compass </h4>
                    <p>A Student Data Management System Designed For You In Mind</p>
                </section>

                <section id="about" class="about-section">
                    <div class="about-box">
                        <h1 class="section-heading">About Us</h1>
                        <p class="section-description">
                            Student Compass collects, stores, and analyzes student data allowing educators to gain deeper insights into student performance, identify patterns, and make data-driven decisions to personalize learning experiences and support student success, all while automating many administrative tasks related to student information.
                            <br> <br>
                            For more information please feel free to contact us.
                        </p>
                        <div class="section-button">
                            <a class="home-button" href="#contact">Contact Us</a>
                        </div>
                    </div>
                </section>

                <section id="service" class="service-section">
                    <div class="service-box">
                        <h4> Our Services </h4>
                        <div class="box">
                            <div class="icon"><i class="service-icon ri-search-line"></i></div>
                            <div class="service-content">
                                <h3>Pleaceholder</h3>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita veritatis iure iste eos laudantium alias magni vero tenetur placeat optio consequuntur, enim consectetur ipsa quia qui earum non ut asperiores!</p>
                            </div>
                        </div>
                        <div class="box">
                            <div class="icon"><i class="service-icon ri-contract-fill"></i></div>
                            <div class="service-content">
                                <h3>Pleaceholder</h3>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita veritatis iure iste eos laudantium alias magni vero tenetur placeat optio consequuntur, enim consectetur ipsa quia qui earum non ut asperiores!</p>
                            </div>
                        </div>
                        <div class="box">
                            <div class="icon"><i class=" service-icon ri-line-chart-fill"></i></div>
                            <div class="service-content">
                                <h3>Pleaceholder</h3>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita veritatis iure iste eos laudantium alias magni vero tenetur placeat optio consequuntur, enim consectetur ipsa quia qui earum non ut asperiores!</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="contact" class="contact-section">
                    <div class="contact-box">
                        <h2> Contact us </h2>

                        <form action="">
                            <div class="row1">
                                <div class="col">
                                    <div class="input-box">
                                        <input type="text" name="" required="required">
                                        <span class="contact-text">First Name</span>
                                        <span class="line"></span>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="input-box">
                                        <input type="text" name="" required="required">
                                        <span class="contact-text">Last Name</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row1">
                                <div class="col">
                                    <div class="input-box">
                                        <input type="text" name="" required="required">
                                        <span class="contact-text">Email</span>
                                        <span class="line"></span>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="input-box">
                                        <input type="text" name="" required="required">
                                        <span class="contact-text">Mobile</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row1">
                                <div class="col">
                                    <div class="input-box textarea">
                                        <textarea required="" name="" id=""></textarea>
                                        <span class="contact-text">Type your message here...</span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row1">
                                <div class="col">
                                    <input class="contact-button" type="submit" value="Send">
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