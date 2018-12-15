<?php
// print_r($_REQUEST);
// print_r($_REQUEST);
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    error_reporting(0);
    extract($_POST, EXTR_SKIP);

    $sql = "INSERT INTO `subscribers`(`email`, `time`) VALUES ('$email', CONVERT_TZ(CURRENT_TIMESTAMP, '+00:00', '+05:30'))";

    require 'db.php';
    $conn = DB::getConnection();
    if ($conn->query($sql) === true) {
        $data = array("message"=>"Thank you for your subscription!", "status"=>"success");
    } elseif (strpos($conn->error, "Duplicate entry") === 0) {
        $data = array("message"=> "Already subscribed.", "status"=>"email_error");
    } else {
        $data = array("message"=> "Something went wrong!", "status"=>"server_error");
    }
    echo json_encode($data);
    return;
}
