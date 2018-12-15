<?php
// print_r($_REQUEST);
$data = array("message"=> "Unknown method", "status"=>"server_error");
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    error_reporting(0);

    session_start();
    $sql = "UPDATE `users` SET `active`=0 WHERE `_uid`=$_SESSION[_uid]";

    require 'db.php';
    $conn = DB::getConnection();
    $result = $conn->query($sql);
    if ($result == true) {
        $data = array("message"=>"User Disabled Successfully!", "status"=>"success");
        require "signout.php";
    } else {
        $data = array("message"=> "Something went wrong!", "status"=>"server_error");
    }
}
echo json_encode($data);
return;
