<?php
 
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  
  function sendMail($email,$otp,$msg){
    echo "In here";
      require ("./phpMailer/Exception.php");
      require ("./phpMailer/PHPMailer.php");
      require ("./phpMailer/SMTP.php");

      $mail= new PHPMailer(true);
      try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'ayesharipa25@gmail.com';                     //SMTP username
        $mail->Password   = '';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('ayesharipa25@gmail.com', 'Registration Confirmation');
        $mail->addAddress($email);     //Add a recipient
        $mail->From = 'ayesharipa25@gmail.com';
        $mail->Sender = $email;

    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Registration OTP';
        $mail->Body    = "Click '$msg' and provide your OTP: '$otp' to verify your account";
    
        $mail->send();
       return true;
    } catch (Exception $e) {
        return false;
    }
  }
?>