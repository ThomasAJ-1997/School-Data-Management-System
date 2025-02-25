<?php
session_start();
if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role'])
) {

    if ($_SESSION['role'] == 'Admin') {


        if (
            isset($_POST['admin_pass']) &&
            isset($_POST['new_pass']) &&
            isset($_POST['c_new_pass']) &&
            isset($_POST['r_user_id'])
        ) {

            include '../../DB_connection.php';
            include "../data/register-office.php";
            include "../data/admin.php";

            $admin_pass = $_POST['admin_pass'];
            $new_pass = $_POST['new_pass'];
            $c_new_pass = $_POST['c_new_pass'];

            $r_user_id = $_POST['r_user_id'];
            $id = $_SESSION['admin_id'];

            $data = 'r_user_id=' . $r_user_id . '#change_password';

            if (empty($admin_pass)) {
                $em  = "Admin password is required";
                header("Location: ../office-edit.php?perror=$em&$data");
                exit;
            } else if (empty($new_pass)) {
                $em  = "You need to enter a new password";
                header("Location: ../office-edit.php?perror=$em&$data");
                exit;
            } else if (empty($c_new_pass)) {
                $em  = "You need to confirm the password";
                header("Location: ../office-edit.php?perror=$em&$data");
                exit;
            } else if ($new_pass !== $c_new_pass) {
                $em  = "Passwords don't match. Please try again.";
                header("Location: ../office-edit.php?perror=$em&$data");
                exit;
            } else if (!adminPasswordVerify($admin_pass, $conn, $id)) {
                $em  = "Admin Password is incorrect.";
                header("Location: ../office-edit.php?perror=$em&$data");
                exit;
            } else {

                $new_pass = password_hash($new_pass, PASSWORD_DEFAULT);
                $sql = "UPDATE register_office SET password=?
                WHERE r_user_id=?";

                $stmt = $conn->prepare($sql);
                $stmt->execute([$new_pass, $r_user_id]);

                $sm = "The password has been changed successfully!";
                header("Location: ../office-edit.php?psuccess=$sm&$data");
                exit;
            }
        } else {
            $em = "An error occurred";
            header("Location: ../office-edit.php?error=$em&$data");
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
