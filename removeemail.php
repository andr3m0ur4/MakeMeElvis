<?php 

    $file = fopen('elvis_store.mme', 'r');

    $list = [];
    $success = 0;

    // percorre o arquivo aberto
    while (!feof($file)) {
        $data = fgets($file);

        $data_detail = explode(';', $data);

        // elimina a última linha vazia
        if (count($data_detail) < 3) {
            continue;
        }

        $email = str_replace(PHP_EOL, '', $data_detail[3]);

        // elimina email submetido pelo formulário
        if (strcmp($email, $_POST['email']) == 0) {
            $success++;
            continue;
        }

        $list[] = $data_detail;
    }

    fclose($file);

    $text = '';

    // salva o array no arquivo da aplicação
    foreach ($list as $data) {
        $text .= implode(';', $data);
    }

    $file = fopen('elvis_store.mme', 'w');

    fwrite($file, $text);

    fclose($file);
    
    require 'templates/template-removeemail.php';
