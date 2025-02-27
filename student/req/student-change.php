<?php
session_start();
if (
    isset($_SESSION['student_id']) &&
    isset($_SESSION['role'])
) {

    if ($_SESSION['role'] == 'Student') {


        if (
            isset($_POST['old_pass']) &&
            isset($_POST['new_pass']) &&
            isset($_POST['c_new_pass'])
        ) {

            include '../../DB_connection.php';
            include "../data/student.php";

            $old_pass = $_POST['old_pass'];
            $new_pass = $_POST['new_pass'];
            $c_new_pass = $_POST['c_new_pass'];

            $student_id = $_SESSION['student_id'];
            $student_pass = $_SESSION['password'];


            if (empty($old_pass)) {
                $em  = "Old password is required";
                header("Location: ../student-edit.php?perror=$em");
                exit;
            } else if (empty($new_pass)) {
                $em  = "You need to enter a new password";
                header("Location: ../pass.php?perror=$em");
                exit;
            } else if (empty($c_new_pass)) {
                $em  = "You need to confirm the password";
                header("Location: ../pass.php?perror=$em");
                exit;
            } else if ($new_pass !== $c_new_pass) {
                $em  = "Passwords don't match. Please try again.";
                header("Location: ../pass.php?perror=$em");
                exit;
            } else if (!studentPasswordVerify($old_pass, $conn, $student_id)) {
                $em  = "Old Password is incorrect.";
                header("Location: ../pass.php?perror=$em");
                exit;
            } else {

                $new_pass = password_hash($new_pass, PASSWORD_DEFAULT);
                $sql = "UPDATE student SET password=?
                WHERE student_id=?";

                $stmt = $conn->prepare($sql);
                $stmt->execute([$new_pass, $student_id]);

                $sm = "The password has been changed successfully!";
                header("Location: ../pass.php?psuccess=$sm&$data");
                exit;
            }
        } else {
            $em = "An error occurred";
            header("Location: ../pass.php?error=$em&$data");
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
