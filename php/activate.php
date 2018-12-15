<?php

$activation = "illegal_access";

if (isset($_GET['hash']) and $_GET['uid']) {
    extract($_GET, EXTR_SKIP);
    if (md5("*WAMP*".$uid."*WAMP*") == $hash) {
        $sql = "UPDATE `users` SET `active`=1 WHERE `_uid`=$uid";
        require 'db.php';
        $conn = DB::getConnection();
        $result = $conn->query($sql);
        if ($result == true) {
            $sql2 = "SELECT `name`, `email`, `username`, `number`, `image`, `active` FROM `users` WHERE `_uid`=$uid";
            $result2 = $conn->query($sql2);
            if ($result2 == true) {
                $data = $result2->fetch_assoc();
                session_start();
                $_SESSION['login'] = true;
                $_SESSION['_uid'] =  $uid;
                $_SESSION['name'] = $data['name'];
                $_SESSION['username'] = $data['username'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['number'] = $data['number'];
                $_SESSION['image'] = $data['image'];
                $_SESSION['active'] = $data['active'];
                $_SESSION['short_name'] = explode(" ", $_SESSION['name'])[0];
                $activation = "success";
                header("Location: dashboard");
                exit;
            }
            $activation = "success";
        } else {
            $activation ="something_w";
        }
    } else {
        $activation ="wrong_url";
    }
}
header("Location: /signin?activation=".$activation);
return;
