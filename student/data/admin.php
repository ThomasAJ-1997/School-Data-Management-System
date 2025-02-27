<?php


function adminPasswordVerify($admin_pass, $conn, $admin_id)
{
    $sql = "SELECT * FROM admin
            WHERE admin_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$admin_id]);

    if ($stmt->rowCount() == 1) {
        $admin = $stmt->fetch();
        $pass  = $admin['password'];

        if ($admin_pass == $pass) {
            return 1;
        } else {
            return 0;
        }
    } else {
        return 0;
    }
}
