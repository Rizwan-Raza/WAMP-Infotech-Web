<?php
// print_r($_REQUEST);
$data = array("message"=> "Unknown method", "status"=>"server_error");
if (isset($_POST['uid']) and isset($_POST['act'])) {
    extract($_POST, EXTR_SKIP);
    $sql = "UPDATE `users` SET `active`=$act WHERE `_uid`=$uid";
    require '../../php/db.php';
    $conn = DB::getConnection();
    $result = $conn->query($sql);
    if ($result == true) {
        $data = array("message"=> "User ".(!$act ? "de": "")."activated successfully!", "status"=>"success");
    } else {
        $data = array("message"=> "Something went wrong.", "status"=>"server_error");
    }
}
echo json_encode($data);
return;
