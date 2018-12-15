<?php
// print_r($_REQUEST);
$data = array("message"=> "Unknown method", "status"=>"server_error");

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    error_reporting(0);
    extract($_REQUEST, EXTR_SKIP);
    // print_r($_POST);

    session_start();
    $sql = "UPDATE `admins` SET `name` = '$name', `username` = '$username'".((isset($password) and !empty($password)) ? ", `password` = MD5('$password')" : "")." WHERE `_aid`=$_SESSION[_aid]";

    // echo $sql;

    require '../../php/db.php';
    $conn = DB::getConnection();
    if ($conn->query($sql) === true) {
        $data = array("message"=>"Profile Updated Successfully!", "status"=>"success");
        $_SESSION['a_name'] = $name;
        $_SESSION['a_username'] = $username;
    } elseif (strpos($conn->error, "Duplicate entry") === 0) {
        $data = array("message"=> "Username already taken, try something else.", "status"=>"username_error");
    } else {
        // echo $conn->error;
        $data = array("message"=> "Something went wrong!", "status"=>"server_error");
    }
}
echo json_encode($data);
return;
