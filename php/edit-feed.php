<?php
// print_r($_REQUEST);
$data = array("message"=> "Unknown method", "status"=>"server_error");
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // error_reporting(0);

    $sql = "UPDATE `feeds` SET `feed`='$_POST[message]', `company`='$_POST[company]' WHERE `_fid`=$_POST[_fid]";

    require 'db.php';
    $conn = DB::getConnection();
    $result = $conn->query($sql);
    if ($result == true) {
        $data = array("message"=>"Feed Updated Successfully!", "status"=>"success");
    } else {
        $data = array("message"=> "Something went wrong!", "status"=>"server_error");
    }
}
echo json_encode($data);
return;
