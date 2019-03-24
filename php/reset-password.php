<?php

$data = array("message"=> "Unknown method", "status"=>"server_error");
extract($_REQUEST, EXTR_SKIP);
if (isset($password) and isset($rrp_password) and $password != $rrp_password) {
    $data = array("message"=>"Password Mismatch!", "status"=>"pass_error");
    echo json_encode($data);
    return;
}
if (isset($hash) and $uid) {
    error_reporting(0);

    if (md5("*WAMP*".$uid."*WAMP*") == $hash) {
        $sql = "UPDATE `users` SET `password`=MD5('$password') WHERE `_uid`=$uid";
        require 'db.php';
        $conn = DB::getConnection();
        $result = $conn->query($sql);
        if ($result == true) {
            $data = array("message"=>"Password reset successfully", "status"=>"success");
        } else {
            $data = array("message"=>"Something went wrong.", "status"=>"server_error");
        }
    } else {
        $data = array("message"=>"Wrong URL, hash mismatch", "status"=>"hash_error");
    }
} else {
    $data = array("message"=>"Missing Paramters", "status"=>"param_error");
}
echo json_encode($data);
return;
