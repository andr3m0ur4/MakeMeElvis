<?php 

    $file = fopen('elvis_store.mme', 'r');

    $list = [];

    while (!feof($file)) {
        $data = fgets($file);

        $data_detail = explode(';', $data);

        if (count($data_detail) < 3) {
            continue;
        }

        $email = str_replace(PHP_EOL, '', $data_detail[3]);

        if (strcmp($email, $_POST['email']) == 0) {
            continue;
        }

        $list[] = $data_detail;
    }

    fclose($file);

    $text = '';

    foreach ($list as $data) {
        $text .= implode(';', $data);
    }

    $file = fopen('elvis_store.mme', 'w');

    fwrite($file, $text);

    fclose($file);
    
    require 'templates/template-removeemail.php';
