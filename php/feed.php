<?php
// print_r($_REQUEST);
// print_r($_REQUEST);
$data = array("message"=> "Unknown method", "status"=>"server_error");
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    error_reporting(0);
    extract($_POST, EXTR_SKIP);
    session_start();
    $sql = "INSERT INTO `feeds`(`_uid`, `company`, `feed`, `time`) VALUES ($_SESSION[_uid], '$company', '$message', CONVERT_TZ(CURRENT_TIMESTAMP, '+00:00', '+05:30'))";

    require 'db.php';
    $conn = DB::getConnection();
    if ($conn->query($sql) === true) {
        
        $data = array("message"=>"Feed added Successfully!", "status"=>"success", "fid"=> $conn->insert_id);
    } else {
        // echo $conn->error;
        $data = array("message"=> "Something went wrong!", "status"=>"server_error");
    }
}
echo json_encode($data);
return;
