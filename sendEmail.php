<?php
    require "C:/wamp64/www/sejal/vendor/autoload.php";
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    $name = $_POST['name'];
    $email = $_POST['email'];
    // $subject = $_POST['subject' ];
    $body = $_POST['body'];        

    $subject="For contact: HH";
    // $body='message';
    
    $mail = new PHPMailer(true);
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->IsHTML(true);
    // $mail->AddReplyTo("vibhu232004@gmail.com");
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = "vibhu232004@gmail.com";
    $mail->Password = "xkwgfnnednerqsvi";

    $mail->setFrom($email,$name);
    $mail->addAddress("vibhu232004@gmail.com");

    $mail->Subject = $subject;  
    $mail->Body = $body;
    $send_m = $mail->send();
    if($send_m)
    {
        alert("Your message is send.");
        // $messages[] = '<div class="alert alert-success alert-dismissible fade show" role="alert"> Your massage is transfer.
        //         <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>';
    }
    else
    {   
        alert("Your message is not send due to some reason.");
        // $message[] = '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Your massage is not transfer.
        //         <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>';
    }
?>