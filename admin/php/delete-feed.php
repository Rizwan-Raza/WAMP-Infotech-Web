<?php
// print_r($_REQUEST);
$data = array("message"=> "Unknown method", "status"=>"server_error");
if ($_SERVER['REQUEST_METHOD'] === "POST" and isset($_POST['_fid'])) {
    error_reporting(0);

    $sql = "DELETE FROM `feeds` WHERE `_fid`=$_POST[_fid]";

    require '../../php/db.php';
    $conn = DB::getConnection();
    $result = $conn->query($sql);
    if ($result == true) {
        $data = array("message"=>"Feed Deleted Successfully!", "status"=>"success");
    } else {
        // $conn->error;
        $data = array("message"=> "Something went wrong!", "status"=>"server_error");
    }
}
echo json_encode($data);
return;
