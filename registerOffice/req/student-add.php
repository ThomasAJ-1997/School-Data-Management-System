<?php
session_start();
if (
    isset($_SESSION['r_user_id']) &&
    isset($_SESSION['role'])
) {

    if ($_SESSION['role'] == 'Register Office') {


        if (
            isset($_POST['fname']) &&
            isset($_POST['lname']) &&
            isset($_POST['username']) &&
            isset($_POST['address']) &&
            isset($_POST['email_address']) &&
            isset($_POST['date_of_birth']) &&
            isset($_POST['gender']) &&
            isset($_POST['parent_fname']) &&
            isset($_POST['parent_lname']) &&
            isset($_POST['parent_phone_number']) &&
            isset($_POST['grade']) &&
            isset($_POST['sections'])
        ) {

            include '../../DB_connection.php';
            include "../data/student.php";
            include "../data/section.php";

            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $uname = $_POST['username'];
            $pass = $_POST['pass'];
            $address = $_POST['address'];
            $email_address = $_POST['email_address'];
            $date_of_birth = $_POST['date_of_birth'];
            $gender = $_POST['gender'];
            $parent_fname = $_POST['parent_fname'];
            $parent_lname = $_POST['parent_lname'];
            $parent_phone_number = $_POST['parent_phone_number'];
            $grade = $_POST['grade'];
            $section = $_POST['sections'];


            $data = 'uname=' . $uname . '&fname=' . $fname . '&lname=' . $lname . '&address=' . $address . '&gender=' . $gender . '&email=' . $email_address . '&pfn=' . $parent_fname . '&pln=' . $parent_lname . '&lname=' . $lname . '&ppn=' . $parent_phone_number;

            if (empty($fname)) {
                $em  = "First name is required";
                header("Location: ../student-add.php?error=$em&$data");
                exit;
            } else if (empty($lname)) {
                $em  = "Last name is required";
                header("Location: ../student-add.php?error=$em&$data");
                exit;
            } else if (empty($uname)) {
                $em  = "Username is required";
                header("Location: ../student-add.php?error=$em&$data");
                exit;
            } else if (!unameIsUnique($uname, $conn)) {
                $em  = "Username is taken! try another";
                header("Location: ../student-add.php?error=$em&$data");
                exit;
            } else if (empty($pass)) {
                $em  = "Password is required";
                header("Location: ../student-add.php?error=$em&$data");
                exit;
            } else if (empty($address)) {
                $em  = "Address is required";
                header("Location: ../student-add.php?error=$em&$data");
                exit;
            } else if (empty($email_address)) {
                $em  = "Email is required";
                header("Location: ../student-add.php?error=$em&$data");
                exit;
            } else if (empty($date_of_birth)) {
                $em  = "Date of birth is required";
                header("Location: ../student-add.php?error=$em&$data");
                exit;
            } else if (empty($gender)) {
                $em  = "Gender field is required";
                header("Location: ../student-add.php?error=$em&$data");
                exit;
            } else if (empty($parent_fname)) {
                $em  = "Parent's first name is required";
                header("Location: ../student-add.php?error=$em&$data");
                exit;
            } else if (empty($parent_lname)) {
                $em  = "Parent's last name is required";
                header("Location: ../student-add.php?error=$em&$data");
                exit;
            } else if (empty($parent_phone_number)) {
                $em  = "Parent's phone number is required";
                header("Location: ../student-add.php?error=$em&$data");
                exit;
            } else if (empty($section)) {
                $em  = "Section is required";
                header("Location: ../student-add.php?error=$em&$data");
                exit;
            } else {
                // hashing the password
                $pass = password_hash($pass, PASSWORD_DEFAULT);

                $sql  = "INSERT INTO
                 student(username, password, fname, lname, grade_type, section, address, gender, email_address, date_of_birth, parent_fname, parent_lname, parent_phone_number)
                 VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$uname, $pass, $fname, $lname, $grade, $section, $address, $gender, $email_address, $date_of_birth, $parent_fname, $parent_lname, $parent_phone_number]);
                $sm = "New student registered successfully";
                header("Location: ../student-add.php?success=$sm");
                exit;
            }
        } else {
            $em = "An error occurred";
            header("Location: ../student-add.php?error=$em");
            exit;
        }
    } else {
        header("Location: ../../logout.php");
        exit;
    }
} else {
    header("Location: ../../logout.php");
    exit;
}
