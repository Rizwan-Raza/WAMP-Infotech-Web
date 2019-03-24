<?php
// print_r($_REQUEST);
// print_r($_REQUEST);
$data = array("message"=> "Unknown method", "status"=>"server_error");

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    error_reporting(0);
    extract($_POST, EXTR_SKIP);

    if (isset($password) and isset($r_password) and $password != $r_password) {
        $data = array("message"=>"Password Mismatch!", "status"=>"pass_error");
        echo json_encode($data);
        return;
    }
    $username = str_replace("@", "_", substr($email, 0, strrpos($email, ".")));
    $sql = "INSERT INTO `users`(`name`, `email`, `number`, `password`, `username`,`time`) VALUES ('$name','$email','$number',MD5('$password'), '$username', CONVERT_TZ(CURRENT_TIMESTAMP, '+00:00', '+05:30'))";

    require 'db.php';
    $conn = DB::getConnection();
    if ($conn->query($sql) === true) {
        require "signup-mail.php";
        $uid = $conn->insert_id;
        $hash = md5("*WAMP*".$uid."*WAMP*");
        $url = "https://www.wampinfotech.com/php/activate.php?hash=$hash&uid=$uid";
        if (signupMail($email, $url)) {
            $data = array("message"=>"Signed up Successfully!", "status"=>"success");
            session_start();
            $_SESSION['login'] = true;
            $_SESSION['_uid'] = $uid;
            $_SESSION['name'] = $name;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['number'] = $number;
            $_SESSION['image'] = "images/users/pikachu_dummy.png";
            $_SESSION['active'] = 0;
            $_SESSION['short_name'] = explode(" ", $_SESSION['name'])[0];
        } else {
            $data = array("message"=> "Sorry, Verify yourself by admin.", "status"=>"server_error");
        }
    } elseif (strpos($conn->error, "Duplicate entry") === 0) {
        $data = array("message"=> "Email already exist, try to login.", "status"=>"email_error");
    } else {
        $data = array("message"=> "Something went wrong!", "status"=>"server_error");
    }
}
echo json_encode($data);
return;
