<?php
    $data = array("message"=> "Unknown method", "status"=>"server_error");
    if ($_SERVER['REQUEST_METHOD'] === "POST" and isset($_POST['username']) and isset($_POST['password'])) {
        // error_reporting(0);
        extract($_POST, EXTR_SKIP);

        $sql = "SELECT `_aid`, `name`, `username` FROM `admins` WHERE `username`='$username' AND `password`=MD5('*WAMP*$password*WAMP*')";
        require '../../php/db.php';
        $conn = DB::getConnection();
        $result = $conn->query($sql);
        if ($result != false) {
            if ($result->num_rows > 0) {
                $u_data = $result->fetch_assoc();
                $data = array("message"=>"Logged In Successfully!", "status"=>"success");
                session_start();
                $_SESSION['admin'] = true;
                $_SESSION['_aid'] =  $u_data['_aid'];
                $_SESSION['a_name'] = $u_data['name'];
                $_SESSION['a_username'] = $u_data['username'];
                if (isset($remember_me) and $remember_me == "on") {
                    setcookie("admin_id", $_SESSION['_aid']);
                }
            } else {
                $data = array("message"=>"Email and Password combination mismatch!", "status"=>"pass_error");
            }
        } else {
            // echo $conn->error;
            $data = array("message"=>"Something went wrong!", "status"=>"server_error");
        }
    }
    echo json_encode($data);
    return;
