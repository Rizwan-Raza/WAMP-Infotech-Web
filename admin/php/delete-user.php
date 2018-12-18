<?php
// print_r($_REQUEST);
$data = array("message"=> "Unknown method", "status"=>"server_error");
if ($_SERVER['REQUEST_METHOD'] === "POST" and isset($_POST['_uid'])) {
    error_reporting(0);

    $sql = "DELETE FROM `users` WHERE `_uid`=$_POST[_uid]";

    require '../../php/db.php';
    $conn = DB::getConnection();
    $result = $conn->query($sql);
    if ($result == true) {
        $data = array("message"=>"User Deleted Successfully!", "status"=>"success");
    } else {
        // $conn->error;
        $data = array("message"=> "Something went wrong!", "status"=>"server_error");
    }
}
echo json_encode($data);
return;
