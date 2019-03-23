<?php
// print_r($_REQUEST);
// return;
$data = array("message"=> "Unknown method", "status"=>"server_error");

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    error_reporting(0);
    extract($_REQUEST, EXTR_SKIP);
    // print_r($_POST);

    session_start();
    $sql = "UPDATE `users` SET `name` = '$name', `username` = '$username', `number` = '$number'".((isset($password) and !empty($password)) ? ", `password` = MD5('$password')" : "")." WHERE `_uid`=$_SESSION[_uid]";

    require 'db.php';
    $conn = DB::getConnection();
    if ($conn->query($sql) === true) {
        $data = array("message"=>"Profile Updated Successfully!", "status"=>"success");
        session_start();
        $_SESSION['name'] = $name;
        $_SESSION['username'] = $username;
        $_SESSION['number'] = $number;
        $_SESSION['short_name'] = explode(" ", $_SESSION['name'])[0];
    } elseif (strpos($conn->error, "Duplicate entry") === 0) {
        $data = array("message"=> "Username already taken, try something else.", "status"=>"username_error");
    } else {
        $data = array("message"=> "Something went wrong!", "status"=>"server_error");
    }
}
echo json_encode($data);
return;
