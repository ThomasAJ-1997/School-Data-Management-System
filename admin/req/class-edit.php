<?php
session_start();
if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role'])
) {

    if ($_SESSION['role'] == 'Admin') {


        if (
            isset($_POST['grade_type']) &&
            isset($_POST['section_name']) &&
            isset($_POST['class_id'])
        ) {

            include '../../DB_connection.php';


            $grade_type = $_POST['grade_type'];
            $section_name = $_POST['section_name'];
            $class_id = $_POST['class_id'];

            $data = 'class_id=' . $class_id;

            if (empty($class_id)) {
                $em  = "No class ID.";
                header("Location: ../class-edit.php?error=$em&$data");
                exit;
            } else if (empty($grade_type)) {
                $em  = "Grade type is required";
                header("Location: ../class-edit.php?error=$em&$data");
                exit;
            } else if (empty($section_name)) {
                $em  = "Section is required";
                header("Location: ../class-edit.php?error=$em&$data");
                exit;
            } else {
                $sql = "UPDATE class SET
                grade=?, section=?
                WHERE class_id=?";

                $stmt = $conn->prepare($sql);
                $stmt->execute([$grade_type, $section_name, $class_id]);
                $sm = "Grade successfully updated!";
                header("Location: ../class-edit.php?success=$sm&$data");
                exit;
            }
        } else {
            $em = "An error occurred";
            header("Location: ../class.php?error=$em");
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
