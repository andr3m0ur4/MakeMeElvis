<?php

    require './Class/Email.php';
    require './bibliotecas/PHPMailer/PHPMailer.php';
    require './bibliotecas/PHPMailer/Exception.php';
    require './bibliotecas/PHPMailer/OAuth.php';
    require './bibliotecas/PHPMailer/SMTP.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $file = fopen('./file/elvis_store.mme', 'r');

    $emails = [];
    $status = 0;

    while (!feof($file)) {
        $data = explode(';', fgets($file));

        if (count($data) < 3) {
            continue;
        }

        $emails[] = str_replace(PHP_EOL, '', $data[3]);
    }

    fclose($file);

    if (!empty($_POST)) {
        $from = 'andre.benedicto@etec.sp.gov.br';

        $email_obj = new Email();

        foreach ($_POST as $key => $value) {
            $email_obj -> __set($key, $value);
        }

        $file = fopen('./file/elvis_store.mme', 'r');

        while (!feof($file)) {
            $data = explode(';', fgets($file));

            if (count($data) < 3) {
                continue;
            }

            if (strcmp(str_replace(PHP_EOL, '', $data[3]), $email_obj -> __get('email')) == 0) {
                $first_name = $data[1];
                $last_name = $data[2];
                $text = $email_obj -> __get('elvismail');

                $msg = "Prezado $first_name $last_name,<br><br>$text";

                $to = $data[3];
            }
        }
        
        // Tudo está certo, enviar email
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail -> SMTPDebug = false;                                 // Enable verbose debug output
            $mail -> isSMTP();                                      // Set mailer to use SMTP
            $mail -> Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail -> SMTPAuth = true;                               // Enable SMTP authentication
            $mail -> Username = 'mouraandre2500@gmail.com';                 // SMTP username
            $mail -> Password = '$andr3_m0ur4';                           // SMTP password
            $mail -> SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail -> Port = 587;                                    // TCP port to connect to
            $mail -> CharSet = 'UTF-8';
            $mail -> Encoding = 'base64';

            //Recipients
            $mail -> From = $from;
            $mail -> FromName = 'Make Me Elvis';
            $mail -> addAddress($to);     // Add a recipient
            //$mail -> addAddress('ellen@example.com');               // Name is optional
            //$mail -> addReplyTo('info@example.com', 'Information');
            //$mail -> addCC('cc@example.com');
            //$mail -> addBCC('bcc@example.com');

            //Attachments
            //$mail -> addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail -> addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail -> isHTML(true);                                  // Set email format to HTML
            $mail -> Subject = $email_obj -> __get('subject');
            $mail -> Body    = $msg;
            $mail -> AltBody = 'É necessário utilizar um client que suporte HTML para ter acesso total ao conteúdo dessa mensagem.';

            $mail -> send();

            $email_obj -> status['code_status'] = 1;
            $email_obj -> status['description_status'] = 'E-mail enviado para: <strong>' . $first_name . ' ' .
                $last_name . '</strong>';

            $status = $email_obj -> status['code_status'];

        } catch (Exception $e) {
            $email_obj -> status['code_status'] = 2;
            $email_obj -> status['description_status'] = 'Não foi possível enviar este e-mail! ' .
                'Por favor tente novamente mais tarde. Detalhes do erro: ' . $mail -> ErrorInfo;

            $status = $email_obj -> status['code_status'];
        }
    }

    $description_status = $email_obj -> status['description_status'] ?? '';

    require './templates/template-sendemail.php';
        