<?php
function signupMail($email, $url)
{
    $to = $email;
    $from = "WAMP Infotech <info@wampinfotech.com>";
    $subject = "Activate yourself for WAMP Infotech";
    $body = '<!DOCTYPE html>
    <html>
    
    <head>
        <meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
    </head>
    
    <body style="font-family: -apple-system,BlinkMacSystemFont,\'Segoe UI\',Roboto,Oxygen-Sans,Ubuntu,Cantarell,\'Helvetica Neue\',sans-serif;margin:0px;background-color: #eeeeee;">
        <table style="background-color: #dddddd;padding: 8px 16px;width: 100%;box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);">
            <tr>
                <td><img src="http://wampinfotech.com/wamp/images/wamp-round-logo.png" height="50px" alt="WAMP InfoTech" /></td>
                <td style="line-height: 50px;vertical-align: top; margin:0px; font-size: 32px; font-weight: 500;">Activate Yourself</td>
            </tr>
        </table>
        <p style="font-family: -apple-system,BlinkMacSystemFont,\'Segoe UI\',Roboto,Oxygen-Sans,Ubuntu,Cantarell,\'Helvetica Neue\',sans-serif;padding: 4px 16px;">Click
            the button below to activate yourself</p>
        <table style="padding: 0px 16px;width: 100%;font-weight: 500;">
            <tr>
                <td>
                    <a style="background-color: #4caf50; border-radius: 4px;border:none;letter-spacing: 0.25px;font-weight: 500;position: relative;display: inline-block;overflow: hidden;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;-webkit-tap-highlight-color: transparent;vertical-align: middle;z-index: 1;-webkit-transition: .3s ease-out;transition: .3s ease-out;text-decoration: none;color: #fff;text-align: center;cursor: pointer;font-size: 14px;outline: 0;height: 36px;line-height: 36px;padding: 0 16px;box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);font-weight: 500;font-family: -apple-system,BlinkMacSystemFont,\'Segoe UI\',Roboto,Oxygen-Sans,Ubuntu,Cantarell,\'Helvetica Neue\',sans-serif" href="'.$url.'">Activate</a>
                </td>
            </tr>
        </table>
        <p style="font-family: -apple-system,BlinkMacSystemFont,\'Segoe UI\',Roboto,Oxygen-Sans,Ubuntu,Cantarell,\'Helvetica Neue\',sans-serif;padding: 4px 16px;">If
            the above button is not clickable, then click here <a href="'.$url.'">'.$url.'</a> or copy it and paste on your browser.</p>
        <table style="background-color: #3d85c6;padding: 8px 16px;width: 100%;color: #ffffff;">
            <tr>
                <td style="line-height: 50px;vertical-align: top; margin:0px; font-size: 24px; font-weight: 500;"><a href="https://wampinfotech.com/"
                        style="color: #ffffff;text-decoration:none">WAMP InfoTech Pvt Ltd.</a></td>
                <td><a href="https://wampinfotech.com/" style="color: #ffffff;text-decoration:none">About</a></td>
                <td><a href="https://wampinfotech.com/" style="color: #ffffff;text-decoration:none">Privacy Policy</a></td>
            </tr>
        </table>
    </body>
    
    </html>';
    
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    // More headers
    $headers .= 'From: '.$from . "\r\n";
    
    return mail($to, $subject, $body, $headers);
}
