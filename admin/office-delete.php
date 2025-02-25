<?php
session_start();
if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role'])     &&
    isset($_GET['r_user_id'])
) {

    if ($_SESSION['role'] == 'Admin') {
        include "../DB_connection.php";
        include "data/register-office.php";

        $id = $_GET['r_user_id'];
        if (deleteUser($id, $conn)) {
            $sm = "Successfully deleted!";
            header("Location: office.php?success=$sm");
            exit;
        } else {
            $em = "Unknown error occurred";
            header("Location: office.php?error=$em");
            exit;
        }
    } else {
        header("Location: office.php");
        exit;
    }
} else {
    header("Location: office.php");
    exit;
}
