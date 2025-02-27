<?php
session_start();

if (
    isset($_POST['uname']) &&
    isset($_POST['pass']) &&
    isset($_POST['role'])
) {

    include "../db_connection.php";

    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $role = $_POST['role'];

    if (empty($uname)) {
        $em  = "Username is required";
        header("Location: ../login.php?error=$em");
        exit;
    } else if (empty($pass)) {
        $em  = "Password is required";
        header("Location: ../login.php?error=$em");
        exit;
    } else if (empty($role)) {
        $em  = "An error Occurred";
        header("Location: ../login.php?error=$em");
        exit;
    } else {

        if ($role == '1') {
            $sql = "SELECT * FROM admin 
        	        WHERE username = ?";
            $role = "Admin";
        } else if ($role == '2') {
            $sql = "SELECT * FROM teacher
        	        WHERE username = ?";
            $role = "Teacher";
        } else if ($role == '3') {
            $sql = "SELECT * FROM student 
        	        WHERE username = ?";
            $role = "Student";
        } else if ($role == '4') {
            $sql = "SELECT * FROM register_office
        	        WHERE username = ?";
            $role = "Register Office";
        }

        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname]);

        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch();
            $username = $user['username'];
            $password = $user['password'];
            $fname = $user['fname'];


            if ($username === $uname) {
                if ($password === $pass) {

                    $_SESSION['role'] = $role;
                    $_SESSION['fname'] = $fname;

                    if ($role == 'Admin') {
                        $id = $user['admin_id'];
                        $_SESSION['admin_id'] = $id;
                        header("Location: ../admin/index.php");
                        exit;
                    } else if ($role == 'Student') {
                        $id = $user['student_id'];
                        $_SESSION['student_id'] = $id;
                        header("Location: ../student/index.php");
                        exit;
                    } else if ($role == 'Teacher') {
                        $id = $user['teacher_id'];
                        $_SESSION['teacher_id'] = $id;
                        header("Location: ../teacher/index.php");
                        exit;
                    } else if ($role == 'Register Office') {
                        $id = $user['r_user_id'];
                        $_SESSION['r_user_id'] = $id;
                        header("Location: ../registerOffice/index.php");
                        exit;
                    }
                } else {
                    $em  = "Incorrect Username or Password";
                    header("Location: ../login.php?error=$em");
                    exit;
                }
            } else {
                $em  = "Incorrect Username or Password";
                header("Location: ../login.php?error=$em");
                exit;
            }
        } else {
            $em  = "Incorrect Username or Password";
            header("Location: ../login.php?error=$em");
            exit;
        }
    }
} else {
    header("Location: ../login.php");
    exit;
}
