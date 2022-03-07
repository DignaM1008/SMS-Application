<?php

if(isset($_POST['submit']))
{   
    
    $contact = $_POST['contact'];
    $message = $_POST['message'];
    //sms code

    $fields = array(
        "message" => "$message",
        "language" => "english",
        "route" => "q",
        "numbers" => "$contact",
    );

    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode($fields),
    CURLOPT_HTTPHEADER => array(
        "authorization: key",
        "accept: */*",
        "cache-control: no-cache",
        "content-type: application/json"
    ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "<script>alert('Message Sending Failed...');</script>";
    } else {
        echo "<script>alert('Message Sent Successfully...');</script>";
    }
  
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"  href="mystyle.css">
    <title>STUDENT SMS APPLICATION </title>
</head>
<body>
    <div class="header">
        <h1>Student SMS Application</h1>
    </div>
    <div class="content">
        <form method="post">
            <table align="center" cellpading="10" cellspacing="20">
                <tr>
                    <td>Mobile Number</td>
                    <td><input type="text" name="contact" id="contact"></td>
                </tr>
                <tr>
                    <td>Message</td>
                    <td><textarea name="message" id="message"></textarea></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Send"></td>
                </tr>
            </table>
        </form>
    </div>
    <div class="footer">
        <h3>All Rights Reserved</h3>
    </div>
</body>
</html>
