<?php

extract($_FILES, EXTR_SKIP);
$data = array("message"=> "Unknown request action", "status"=>"server_error");
if (isset($profile_chooser)) {
    session_start();
    $target_dir = "images/users/";
    $target_file = $target_dir ."user-". $_SESSION['_uid'];

    if ($_SESSION['image'] == $target_file) {
        unlink($target_file);
    }

    if (move_uploaded_file($profile_chooser["tmp_name"], "../".$target_file)) {
        if ($_SESSION['image'] != $target_file) {
            $sql = "UPDATE `users` SET `image` = '$target_file' WHERE `_uid`=$_SESSION[_uid]";
            require 'db.php';
            $conn = DB::getConnection();
            if ($conn->query($sql) === true) {
                $_SESSION['image'] = $target_file;
            }
        }
        $data = array("message"=>"Uploaded Successfully", "status"=>"success");
    } else {
        $data = array("message"=>"Something went wrong", "status"=>"server_error");
    }
}
echo json_encode($data);
return;
