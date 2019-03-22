<?php
    require("src/Instamojo.php");
    require 'db.php';
    $conn = DB::getConnection();
        
   $purpose = $_POST['purpose'];
   $name = $_POST['name'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $amount = $_POST['amount'];
   $api = new Instamojo\Instamojo("130191b5fe64c71741350c7758d8cb20", "cf815c6b1d8ad8fa9598c5fd5561155b");

    try {
        $response = $api->paymentRequestCreate(array(
            "purpose" => $purpose,
            "buyer_name"=>$name,
            "amount" => $amount,
            "phone"=>$phone,
            "send_email" => true,
            "send_sms"=>true,
            "email" => $email,
            "redirect_url" => "https://www.wampinfotech.com/pay"
        ));
        $id = $conn->real_escape_string($response['id']);
        # print_r($response);
        $sql = "INSERT INTO payments(`name`,`email`,`purpose`,`phone`,`amount`, `time`,`insta_payment_id`) VALUES('$name','$email', '$purpose', '$phone','$amount',CONVERT_TZ(CURRENT_TIMESTAMP, '+00:00', '+05:30'), '$id')";
        $conn->query($sql);
        header("Location:$response[longurl]");
    } catch (Exception $e) {
        print('Error: ' . $e->getMessage());
    }
