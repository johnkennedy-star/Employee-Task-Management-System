<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
if (isset($_POST["add_task_post"])) {

  $mail = new PHPMailer(true);

    //Server settings
    $mail->isSMTP();                              //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;             //Enable SMTP authentication
    $mail->Username   = 'orengokennedy93@gmail.com';   //SMTP write your email
    $mail->Password   = 'preyfstsqfcyigcn';      //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit SSL encryption
    $mail->Port       = 465;                                    

    //Recipients
    $mail->setFrom( $_POST["to"], $_POST["assign_to"]); // Sender Email and name
    $mail->addAddress('orengokennedy93@gmail.com');
    //$mail->addAddress('kasesodavis@gmail.com');
    //$mail->addAddress('ekiburio@cuea.edu');
    //$mail->addAddress('e7197285@gmail.com'); 
     //$mail->addAddress('chirchirjames154@gmail.com');     //Add a recipient email  
    $mail->addReplyTo($_POST["to"], $_POST["assign_to"]); // reply to sender email

    //Content
    $mail->isHTML(true);               //Set email format to HTML
    $mail->Subject = $_POST["task_title"];   // email subject headings
    $mail->Body    = $_POST["task_description"]; //email message

    // Success sent message alert
    $mail->send();
    echo
    " 
    <script> 
     alert('Task assigned successfully!');
     document.location.href = 'index.php';
    </script>
    ";
}
?>