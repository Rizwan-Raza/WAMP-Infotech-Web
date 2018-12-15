<?php
// print_r($_REQUEST);
$data = array("message"=> "Unknown method", "status"=>"server_error");
if (isset($_POST['fid']) and isset($_POST['act'])) {
    extract($_POST, EXTR_SKIP);
    $sql = "UPDATE `feeds` SET `approved`=$act WHERE `_fid`=$fid";
    require '../../php/db.php';
    $conn = DB::getConnection();
    $result = $conn->query($sql);
    if ($result == true) {
        $data = array("message"=> "Feed ".(!$act ? "denied": "approved")." successfully!", "status"=>"success");
    } else {
        $data = array("message"=> "Something went wrong.", "status"=>"server_error");
    }
}
echo json_encode($data);
return;
