<?php
//action page to send email notfication
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
        //Load composer's autoloader
    require 'vendor/autoload.php';
 
    $mail = new PHPMailer(true);                            
    try {
        //Server settings
        $mail->isSMTP();                                     
        $mail->Host = 'smtp.gmail.com';                      
        $mail->SMTPAuth = true;                             
        $mail->Username = 'csemesh@gmail.com';     
        $mail->Password = 'cseMeshfor383';             
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
        );                         
        $mail->SMTPSecure = 'ssl';                           
        $mail->Port = 465;                                   
 
        //Send Email
        $mail->setFrom('csemesh@gmail.com');
 
        //Recipients
        $mail->addAddress($_SESSION['email']);              
        $mail->addReplyTo('csemesh@gmail.com');
         //Content
        $mail->isHTML(true);                                  
        $mail->Subject = $_SESSION['subject'];
        $mail->Body    = $_SESSION['message'];
 
        $mail->send();
 
       $_SESSION['result'] = 'Message has been sent';
       $_SESSION['status'] = 'ok';
    } catch (Exception $e) {
       $_SESSION['result'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
       $_SESSION['status'] = 'error';
    }
?>