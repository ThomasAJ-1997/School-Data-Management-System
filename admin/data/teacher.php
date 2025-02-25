<?php

function allTeachers($conn)
{
    $sql = 'SELECT * FROM teacher';

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        $teachers = $stmt->fetchAll();
        return $teachers;
    } else {
        return 0;
    }
}

function getTeachertById($teacher_id, $conn)
{
    $sql = 'SELECT * FROM teacher WHERE teacher_id=?';

    $stmt = $conn->prepare($sql);
    $stmt->execute([$teacher_id]);

    if ($stmt->rowCount() == 1) {
        $teacher = $stmt->fetch();
        return $teacher;
    } else {
        return 0;
    }
}


function unameIsUnique($uname, $conn, $teacher_id = 0)
{
    $sql = 'SELECT username, teacher_id FROM teacher WHERE username=?';

    $stmt = $conn->prepare($sql);
    $stmt->execute([$uname]);

    if ($teacher_id == 0) {
        if ($stmt->rowCount() >= 1) {
            return 0;
        } else {
            return 1;
        }
    } else {
        if ($stmt->rowCount() >= 1) {
            $teacher = $stmt->fetch();
            if ($teacher['teacher_id'] == $teacher_id) {
                return 1;
            } else return 0;
        } else {
            return 1;
        }
    }
}

function deleteTeacher($id, $conn)
{
    $sql = 'DELETE FROM teacher WHERE teacher_id=?';

    $stmt = $conn->prepare($sql);
    $re = $stmt->execute([$id]);

    if ($re) {
        return 1;
    } else {
        return 0;
    }
}

function searchTeacher($key, $conn)
{
    $key = preg_replace('/(?<!\\\)([%_])/', '\\\$1', $key);
    $sql = "SELECT * FROM teacher WHERE teacher_id LIKE ? OR fname LIKE ? OR lname LIKE ? OR username LIKE ? OR address LIKE ? OR employee_number LIKE ? OR date_of_birth LIKE ? OR qualification LIKE ? OR email_address LIKE ? OR gender LIKE ?";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$key, $key, $key, $key, $key, $key, $key, $key, $key, $key]);

    if ($stmt->rowCount() == 1) {
        $teachers = $stmt->fetchAll();
        return $teachers;
    } else {
        return 0;
    }
}
