<?php


        // Import PHPMailer classes into the global namespace
        // These must be at the top of your script, not inside a function
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        //Load composer's autoloader
        require 'vendor/autoload.php';




        $name = '';
        $email = '';
        $message = '';


        if($_POST) {

          // Anrede
          $name = $_POST["name"];
          $email = $_POST["email"];
          $message = $_POST["message"];
        }
      else{
        return;
      }

        // ------------------------------------------------ //

        //include_once 'vendor/phpmailer/phpmailer/src/PHPMailer.php';

        $mail = new PHPMailer(true);

        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.easyname.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = '54672mail23';                 // SMTP username
        $mail->Password = 'devgimami0113';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        $mail->setFrom('office@k25.at', 'Tester');
        $mail->addAddress($email);     // Add a recipient

        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        $mail->isHTML(true);
        $mail->CharSet = 'utf-8';
        $mail->Subject = 'testmail';
        $mail->Body    = $name . " " . $email . " " . $message;

        // $mail->AltBody = 'Plain text for non-HTML mail clients';

        if(!$mail->send()) {
          // echo 'Message could not be sent.';
          // echo 'Mailer Error: ' . $mail->ErrorInfo;

            // $mail_data['success'] = false;

            $error = array(
                'fail' => 'yes',
             );

            //echo json_encode($error);
            echo json_encode($error);
          } else {

            // $mail_data['success'] = true;

            $error = array(
                'fail' => 'no',
             );

            //echo json_encode($error);
            echo json_encode($error);
          }


?>
