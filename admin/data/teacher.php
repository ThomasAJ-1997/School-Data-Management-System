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

function unameIsUnique($uname, $conn)
{
    $sql = 'SELECT username FROM teacher WHERE username=?';

    $stmt = $conn->prepare($sql);
    $stmt->execute([$uname]);

    if ($stmt->rowCount() >= 1) {
        return 0;
    } else {
        return 1;
    }
}
