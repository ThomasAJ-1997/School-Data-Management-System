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
