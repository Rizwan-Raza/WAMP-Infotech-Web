<?php
header('Access-Control-Allow-Origin: *');
// print_r($_REQUEST);
// // print_r($_REQUEST);
$data = array("message"=> "Unknown method", "status"=>"server_error");
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['name']) and isset($_POST['email']) and isset($_POST['number']) and isset($_POST['message'])) {
        error_reporting(0);
        extract($_POST, EXTR_SKIP);

        $sql = "INSERT INTO `queries`(`name`, `email`, `number`, `company`, `message`, `country`, `service`, `time`) VALUES ('$name','$email','$number','$company', '$message', '$country', '$service', CONVERT_TZ(CURRENT_TIMESTAMP, '+00:00', '+05:30'))";

        require 'db.php';
        $conn = DB::getConnection();
        if ($conn->query($sql) === true) {

        // For testing purpose only.
            // $to = "rizwan.raza987@gmail.com";
            $to = "wampinfotech@gmail.com";
            $from = "$name <$email>";
            $subject = "Enquiry from WAMP Infotech Web Platform.";
            $body = '<!DOCTYPE html>
        <html>
        
        <head>
            <meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
        </head>
        
        <body style="font-family: Arial, Helvetica, sans-serif;margin:0px;background-color: #ffffff;">
            <table style="background-color: #eeeeee;padding: 8px 16px;width: 100%;box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);">
                <tr>
                    <td><img src="https://www.wampinfotech.com/images/wamp-round-logo.png" height="50px" alt="WAMP InfoTech" /></td>
                    <td style="line-height: 50px;vertical-align: top; margin:0px; font-size: 32px; font-weight: 500;">Enquiry
                        from WAMP InfoTech Web</td>
                </tr>
            </table>
            <table style="padding: 8px 16px;width: 100%;font-weight: 500;" cellspacing="10">
                <tr>
                    <td style="color: #3d85c6;width: 30%">Name:</td>
                    <td style="width: 70%;">'.$name.'</td>
                </tr>
                <tr>
                    <td style="color: #3d85c6;width: 30%">Email:</td>
                    <td style="width: 70%;">'.$email.'</td>
                </tr>
                <tr>
                    <td style="color: #3d85c6;width: 30%">Number:</td>
                    <td style="width: 70%;">'.$number.'</td>
                </tr>
                <tr>
                    <td style="color: #3d85c6;width: 30%">Company:</td>
                    <td style="width: 70%;">'.$company.'</td>
                </tr>'.
                (isset($country) ? '
                <tr>
                    <td style="color: #3d85c6;width: 30%">Country:</td>
                    <td style="width: 70%;">'.(($country == 1) ? "United States" : (($country == 2) ? "India" : "Others")).'</td>
                </tr>
                ': "").
                (isset($service) ? '
                <tr>
                    <td style="color: #3d85c6;width: 30%">Service:</td>
                    <td style="width: 70%;">'.$service.'</td>
                </tr>
                ': "").
                '<tr>
                    <td style="color: #3d85c6;width: 30%">Message:</td>
                    <td style="width: 70%;">'.$message.'</td>
                </tr>
            </table>
            <table style="background-color: #3d85c6;padding: 8px 16px;width: 100%;color: #ffffff;">
                <tr>
                    <td style="line-height: 50px;vertical-align: top; margin:0px; font-size: 24px; font-weight: 500;"><a href="https://wampinfotech.com/"
                            style="color: #ffffff;text-decoration:none">WAMP InfoTech Pvt Ltd.</a></td>
                    <td><a href="https://www.wampinfotech.com/overview" style="color: #ffffff;text-decoration:none">About</a></td>
                    <td><a href="https://www.wampinfotech.com/privacy-policy" style="color: #ffffff;text-decoration:none">Privacy Policy</a></td>
                </tr>
            </table>
        </body>
        
        </html>';

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "Cc: info@wampinfotech.com" . "\r\n";

            // More headers
            $headersO = $headers . 'From: '.$from . "\r\n";

            if (mail($to, $subject, $body, $headersO)) {
                $data = array("message"=>"Thank you! We will contact you soon.", "status"=>"success");
            } else {
                $headersO = $headers . 'From: Support | WAMP Infotech <support@wampinfotech.com>'."\r\n";
                mail($to, $subject, $body, $headers);
                $data = array("message"=>"Email seems to be wrong, Try again.", "status"=>"success");
            }
        } else {
            $data = array("message"=>"Something went wrong! Try again", "status"=>"server_error");
        }
    } else {
        $data = array("message"=>"Parameters missing", "status"=>"server_error");
    }
}
echo json_encode($data);
return;
