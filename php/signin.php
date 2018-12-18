<?php
    $data = array("message"=> "Unknown method", "status"=>"server_error");
    if ($_SERVER['REQUEST_METHOD'] === "POST" and isset($_POST['email']) and isset($_POST['password'])) {
        // error_reporting(0);
        extract($_POST, EXTR_SKIP);

        $sql = "SELECT `_uid`, `name`, `email`, `username`, `number`, `image`, `active`, `disabled` FROM `users` WHERE (`email`='$email' OR `username`='$email') AND `password`=MD5('$password')";
        require 'db.php';
        $conn = DB::getConnection();
        $result = $conn->query($sql);
        // echo "Result(".$conn.")";
        if ($result != false) {
            if ($result->num_rows > 0) {
                $u_data = $result->fetch_assoc();
                if ($u_data['disabled'] == 0) {
                    if ($u_data['active'] == 1) {
                        $data = array("message"=>"Logged In Successfully!", "status"=>"success");
                        session_start();
                        $_SESSION['login'] = true;
                        $_SESSION['_uid'] =  $u_data['_uid'];
                        $_SESSION['name'] = $u_data['name'];
                        $_SESSION['username'] = $u_data['username'];
                        $_SESSION['email'] = $u_data['email'];
                        $_SESSION['number'] = $u_data['number'];
                        $_SESSION['image'] = $u_data['image'];
                        $_SESSION['active'] = $u_data['active'];
                        $_SESSION['short_name'] = explode(" ", $_SESSION['name'])[0];
                        if (isset($remember_me) and $remember_me == "on") {
                            $_COOKIE["user_id"] = $_SESSION["_uid"];
                            setcookie("user_id", $_SESSION['_uid']);
                        }
                    } else {
                        require "signup-mail.php";
                        $uid = $u_data['_uid'];
                        $hash = md5("*WAMP*".$uid."*WAMP*");
                        $url = "https://wampinfotech.com/php/activate.php?hash=$hash&uid=$uid";
                        if (signupMail($u_data['email'], $url)) {
                            $data = array("message"=>"Activate yourself first. Check your mail", "status"=>"active_error");
                        } else {
                            $data = array("message"=>"Activate yourself first.", "status"=>"active_error");
                        }
                    }
                } else {
                    $data = array("message"=>"You are removed from our system, ask admin to revive.", "status"=>"active_error");
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
