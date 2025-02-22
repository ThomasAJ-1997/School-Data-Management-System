<?php
session_start();
if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role'])
) {

    if ($_SESSION['role'] == 'Admin') {


        if (
            isset($_POST['grade_type']) &&
            isset($_POST['grade_code'])
        ) {

            include '../../DB_connection.php';

            $grade_type = $_POST['grade_type'];
            $grade_code = $_POST['grade_code'];


            $data = 'grade_type=' . $grade_type . '&grade_code' . $grade_code;

            if (empty($grade_type)) {
                $em  = "Grade type is required";
                header("Location: ../grade-add.php?error=$em&$data");
                exit;
            } else if (empty($grade_code)) {
                $em  = "Grade code is required";
                header("Location: ../grade-add.php?error=$em&$data");
                exit;
            } else if (!is_numeric($grade_code)) {
                $em  = "Grade code requires a numerical value. No letters or symbols.";
                header("Location: ../grade-add.php?error=$em&$data");
                exit;
            } else {
                $sql  = "INSERT INTO
                 grade(grade_type, grade_code)
                 VALUES(?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$grade_type, $grade_code]);
                $sm = "New Grade created successfully";
                header("Location: ../grade-add.php?success=$sm");
                exit;
            }
        } else {
            $em = "An error occurred";
            header("Location: ../grade-add.php?error=$em");
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
