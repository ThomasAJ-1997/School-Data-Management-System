<?php

function allGrades($conn)
{
    $sql = "SELECT * FROM grade";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        $grades = $stmt->fetchAll();
        return $grades;
    } else {
        return 0;
    }
}


function getGradeById($grade_id, $conn)
{
    $sql = 'SELECT * FROM grade WHERE grade_id=?';

    $stmt = $conn->prepare($sql);
    $stmt->execute([$grade_id]);

    if ($stmt->rowCount() == 1) {
        $grade = $stmt->fetch();
        return $grade;
    } else {
        return 0;
    }
}


function deleteGrade($id, $conn)
{
    $sql = 'DELETE FROM grade WHERE grade_id=?';

    $stmt = $conn->prepare($sql);
    $re = $stmt->execute([$id]);

    if ($re) {
        return 1;
    } else {
        return 0;
    }
}
