<?php
session_start();
if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role'])
) {

    if ($_SESSION['role'] == 'Admin') {


        if (
            isset($_POST['section_name']) &&
            isset($_POST['section_id'])
        ) {

            include '../../DB_connection.php';


            $section_name = $_POST['section_name'];
            $section_id = $_POST['section_id'];

            $data = 'section_name=' . $section_name . '&section_id=' . $section_id;

            if (empty($section_name)) {
                $em  = "Section name is required";
                header("Location: ../section-edit.php?error=$em&$data");
                exit;
            } else if (is_numeric($section_name)) {
                $em  = "Error: Section name requires only letter input.";
                header("Location: ../section-add.php?error=$em&$data");
                exit;
            } else {
                $sql = "UPDATE section SET
                section_name = ?
                WHERE section_id=?";

                $stmt = $conn->prepare($sql);
                $stmt->execute([$section_name, $section_id]);
                $sm = "Grade successfully updated!";
                header("Location: ../section-edit.php?success=$sm&$data");
                exit;
            }
        } else {
            $em = "An error occurred";
            header("Location: ../section.php?error=$em");
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
