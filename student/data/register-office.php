<?php

// Get r_user by ID
function getUsersById($r_user_id, $conn)
{
    $sql = "SELECT * FROM register_office
           WHERE r_user_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$r_user_id]);

    if ($stmt->rowCount() == 1) {
        $teacher = $stmt->fetch();
        return $teacher;
    } else {
        return 0;
    }
}

// All r_users 
function allUsers($conn)
{
    $sql = "SELECT * FROM register_office";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        $teachers = $stmt->fetchAll();
        return $teachers;
    } else {
        return 0;
    }
}

// Check if the username Unique
function unameIsUnique($uname, $conn, $r_user_id = 0)
{
    $sql = "SELECT username, r_user_id FROM register_office
           WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$uname]);

    if ($r_user_id == 0) {
        if ($stmt->rowCount() >= 1) {
            return 0;
        } else {
            return 1;
        }
    } else {
        if ($stmt->rowCount() == 1) {
            $r_user = $stmt->fetch();
            if ($r_user['r_user_id'] == $r_user_id) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 1;
        }
    }
}

// DELETE
function deleteUser($id, $conn)
{
    $sql  = "DELETE FROM register_office
           WHERE r_user_id=?";
    $stmt = $conn->prepare($sql);
    $re   = $stmt->execute([$id]);
    if ($re) {
        return 1;
    } else {
        return 0;
    }
}
