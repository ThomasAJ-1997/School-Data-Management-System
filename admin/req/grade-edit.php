<?php
session_start();
if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role'])
) {

    if ($_SESSION['role'] == 'Admin') {


        if (
            isset($_POST['grade_type']) &&
            isset($_POST['grade_code']) &&
            isset($_POST['grade_id'])
        ) {

            include '../../DB_connection.php';


            $grade_type = $_POST['grade_type'];
            $grade_code = $_POST['grade_code'];
            $grade_id = $_POST['grade_id'];

            $data = 'grade_type=' . $grade_type . '&grade_code' . $grade_code . '&grade_id=' . $grade_id;

            if (empty($grade_type)) {
                $em  = "Grade type is required";
                header("Location: ../grade-edit.php?error=$em&$data");
                exit;
            } else if (empty($grade_code)) {
                $em  = "Grade code is required";
                header("Location: ../grade-edit.php?error=$em&$data");
                exit;
            } else if (!is_numeric($grade_code)) {
                $em  = "Grade code requires a numerical value. No letters or symbols.";
                header("Location: ../grade-edit.php?error=$em&$data");
                exit;
            } else {
                $sql = "UPDATE grade SET
                grade_type = ?, grade_code=?
                WHERE grade_id=?";

                $stmt = $conn->prepare($sql);
                $stmt->execute([$grade_type, $grade_code, $grade_id]);
                $sm = "Grade successfully updated!";
                header("Location: ../grade-edit.php?success=$sm&$data");
                exit;
            }
        } else {
            $em = "An error occurred";
            header("Location: ../grade.php?error=$em");
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
