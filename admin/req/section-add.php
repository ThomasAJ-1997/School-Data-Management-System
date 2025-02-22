<?php
session_start();
if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role'])
) {

    if ($_SESSION['role'] == 'Admin') {


        if (
            isset($_POST['section_name'])
        ) {

            include '../../DB_connection.php';

            $section_name = $_POST['section_name'];


            $data = 'section_name=' . $section_name;

            if (empty($section_name)) {
                $em  = "Section name is required";
                header("Location: ../section-add.php?error=$em&$data");
                exit;
            } else if (is_numeric($section_name)) {
                $em  = "Error: Section name requires only letter input.";
                header("Location: ../section-add.php?error=$em&$data");
                exit;
            } else {
                $sql  = "INSERT INTO
                 section(section_name)
                 VALUES(?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$section_name]);
                $sm = "New Section created successfully";
                header("Location: ../section-add.php?success=$sm");
                exit;
            }
        } else {
            $em = "An error occurred";
            header("Location: ../section-add.php?error=$em");
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
