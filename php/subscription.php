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
        
        

    $to = $email;
    $from = "WAMP Infotech <info@wampinfotech.com>";
    $subject = "Thanks for
    your subscription!";
    $body = '<!DOCTYPE html>
    <html>
    
    <head>
        <meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
    </head>
    
    <body
        style="font-family: -apple-system,BlinkMacSystemFont,\'Segoe UI\',Roboto,Oxygen-Sans,Ubuntu,Cantarell,\'Helvetica Neue\',sans-serif;margin:0px;background-color: #eeeeee;">
        <table
            style="background-color: #dddddd;padding: 8px 16px;width: 100%;box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);">
            <tr>
                <td><img src="http://www.wampinfotech.com/images/wamp-round-logo.png" height="50px" alt="WAMP InfoTech" />
                </td>
                <td style="line-height: 50px;vertical-align: top; margin:0px; font-size: 32px; font-weight: 500;">Thanks!
                </td>
            </tr>
        </table>
        <p
            style="font-family: -apple-system,BlinkMacSystemFont,\'Segoe UI\',Roboto,Oxygen-Sans,Ubuntu,Cantarell,\'Helvetica Neue\',sans-serif;padding: 4px 16px;">
            The WAMP Family welcomes and promises to keep you Technically Aware and Market Ready.
            <br /><br />
            We aspire to work hand in hand in with our subscribers with the aim to achieve an enriching knowledge-rich
            business-friendly relationship.<br /><br />
            Thanks,<br />
            Team WAMP</p>
        <table style="background-color: #3d85c6;padding: 8px 16px;width: 100%;color: #ffffff;">
            <tr>
                <td style="line-height: 50px;vertical-align: top; margin:0px; font-size: 24px; font-weight: 500;"><a
                        href="https://wampinfotech.com/" style="color: #ffffff;text-decoration:none">WAMP InfoTech Pvt
                        Ltd.</a></td>
                <td><a href="https://www.wampinfotech.com/about" style="color: #ffffff;text-decoration:none">About</a></td>
                <td><a href="https://www.wampinfotech.com/privacy-policy"
                        style="color: #ffffff;text-decoration:none">Privacy Policy</a></td>
            </tr>
        </table>
    </body>
    
    </html>';
    
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    // More headers
    $headers .= 'From: '.$from . "\r\n";
    
    if(mail($to, $subject, $body, $headers)) {

        $sql2 = "UPDATE `subscribers` SET `valid`=1 WHERE `_sid`=$conn->insert_id";

        if($conn->query($sql2)) {
            $data = array("message"=>"Thank you for your subscription!", "status"=>"success");
        } else {
            $data = array("message"=>"Thanks for your subscription!", "status"=>"query_error");
        }

    } else {
        $data = array("message"=> "Sorry, but we can't able to send you email, try another email address", "status"=>"mail_error");
    }
    } elseif (strpos($conn->error, "Duplicate entry") === 0) {
        $data = array("message"=> "Already subscribed.", "status"=>"email_error");
    } else {
        $data = array("message"=> "Something went wrong!", "status"=>"server_error");
    }
    echo json_encode($data);
    return;
}
