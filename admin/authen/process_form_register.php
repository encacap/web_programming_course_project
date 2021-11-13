<?php

$fullname = $email = $msg = "";

if (!empty($_POST)) {
    $fullname = getPost("fullname");
    $email = getPost("email");
    $pwd = getPost("password");

    //validate
    if (empty($fullname) || empty($email) || empty($pwd) || strlen($pwd) < 6) {
    } else {
        //Validate thanh cong
        $userExist = executeResult(
            "SELECT * FROM User WHERE email = '$email'",
            true
        );
        if ($userExist != null) {
            $msg = "Email đã tồn tại!";
        } else {
            $created_at = $updated_at = date("Y-m-d H:i:s");
            //Su dung ma hoa 1 chieu -> md5 -> hack
            $pwd = getSecurityMD5($pwd);

            $sql = "INSERT INTO User (fullname, email, password, role_id, created_at, updated_at, deleted) VALUES ('$fullname', '$email', '$pwd', 2, '$created_at', '$updated_at', 0)";
            execute($sql);
            header("Location: login.php");
            die();
        }
    }
}
