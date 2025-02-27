<?php

function allStudents($conn)
{
    $sql = 'SELECT * FROM student';

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        $students = $stmt->fetchAll();
        return $students;
    } else {
        return 0;
    }
}

// Get Teacher by ID
function getStudentById($id, $conn)
{
    $sql = "SELECT * FROM student
            WHERE student_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if ($stmt->rowCount() == 1) {
        $student = $stmt->fetch();
        return $student;
    } else {
        return 0;
    }
}


function unameIsUnique($uname, $conn, $student_id = 0)
{
    $sql = "SELECT username, student_id FROM student
            WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$uname]);

    if ($student_id == 0) {
        if ($stmt->rowCount() >= 1) {
            return 0;
        } else {
            return 1;
        }
    } else {
        if ($stmt->rowCount() >= 1) {
            $student = $stmt->fetch();
            if ($student['student_id'] == $student_id) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 1;
        }
    }
}


function deleteStudent($id, $conn)
{
    $sql = 'DELETE FROM student WHERE student_id=?';

    $stmt = $conn->prepare($sql);
    $re = $stmt->execute([$id]);

    if ($re) {
        return 1;
    } else {
        return 0;
    }
}

function searchStudent($key, $conn)
{
    $key = preg_replace('/(?<!\\\)([%_])/', '\\\$1', $key);
    $sql = "SELECT * FROM student WHERE student_id LIKE ? OR fname LIKE ? OR lname LIKE ? OR username LIKE ? OR address LIKE ? OR email_address LIKE ? OR date_of_birth LIKE ? OR parent_fname LIKE ? OR parent_lname LIKE ?";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$key, $key, $key, $key, $key, $key, $key, $key, $key]);

    if ($stmt->rowCount() == 1) {
        $students = $stmt->fetchAll();
        return $students;
    } else {
        return 0;
    }
}


function studentPasswordVerify($student_pass, $conn, $student_id)
{
    $sql = "SELECT * FROM student
            WHERE student_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$student_id]);

    if ($stmt->rowCount() == 1) {
        $student = $stmt->fetch();
        $pass  = $student['password'];

        if ($student_pass == $pass) {
            return 1;
        } else {
            return 0;
        }
    } else {
        return 0;
    }
}
