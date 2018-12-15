<?php
// print_r($_REQUEST);
// sleep(2);
$data = array("message"=> "Unknown method", "status"=>"server_error");
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    error_reporting(0);

    $sql = "DELETE FROM `visitors` WHERE `_vid`=$_POST[_vid]";

    require '../../php/db.php';
    $conn = DB::getConnection();
    $result = $conn->query($sql);
    if ($result == true) {
        $data = array("message"=>"Visitor deleted Successfully!", "status"=>"success");
    } else {
        $data = array("message"=> "Something went wrong!", "status"=>"server_error");
    }
}
echo json_encode($data);
return;
