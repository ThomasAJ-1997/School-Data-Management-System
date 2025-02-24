<?php
session_start();
if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role'])
) {

    if ($_SESSION['role'] == 'Admin') {


        if (
            isset($_POST['grade_type']) &&
            isset($_POST['section_name'])
        ) {

            include '../../DB_connection.php';

            $grade_type = $_POST['grade_type'];
            $section_name = $_POST['section_name'];

            if (empty($grade_type)) {
                $em  = "Grade type is required";
                header("Location: ../class-add.php?error=$em");
                exit;
            } else if (empty($section_name)) {
                $em  = "Section name is required";
                header("Location: ../class-add.php?error=$em");
                exit;
            } else {
                $sql_check = "SELECT * FROM class
                WHERE grade=? AND section=?";
                $stmt_check = $conn->prepare($sql_check);
                $stmt_check->execute([$grade_type, $section_name]);

                if ($stmt_check->rowCount() > 0) {
                    $em = 'This Class already exists.';
                    header("Location: ../class-add.php?error=$em");
                } else {
                    $sql  = "INSERT INTO
                    class(grade, section)
                    VALUES(?,?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([$grade_type, $section_name]);
                    $sm = "New Class created successfully";
                    header("Location: ../class-add.php?success=$sm");
                    exit;
                }
            }
        } else {
            $em = "An error occurred";
            header("Location: ../class-add.php?error=$em");
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
