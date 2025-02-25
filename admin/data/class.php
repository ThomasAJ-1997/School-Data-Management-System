<?php

function allClasses($conn)
{
    $sql = "SELECT * FROM class";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        $class = $stmt->fetchAll();
        return $class;
    } else {
        return 0;
    }
}


function getClassById($class_id, $conn)
{
    $sql = 'SELECT * FROM class WHERE class_id=?';

    $stmt = $conn->prepare($sql);
    $stmt->execute([$class_id]);

    if ($stmt->rowCount() == 1) {
        $class = $stmt->fetch();
        return $class;
    } else {
        return 0;
    }
}


function deleteClass($id, $conn)
{
    $sql = 'DELETE FROM class WHERE class_id=?';

    $stmt = $conn->prepare($sql);
    $re = $stmt->execute([$id]);

    if ($re) {
        return 1;
    } else {
        return 0;
    }
}
