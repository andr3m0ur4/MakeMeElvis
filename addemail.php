<?php

    $error = false;

    try {
        // abrir arquivo da aplicação
        $file = fopen('elvis_store.mme', 'r');

        $last_line = '';

        // pegar o último registro
        while (($line = fgets($file)) != false) {
            $last_line = $line;
        }

        fclose($file);

        $id = explode(';', $last_line);

        // se não houver registro salvo, define o id como 1, senão incrementa o valor
        if (!$id[0]) {
            $id[0] = 1;
        } else {
            $id[0]++;
        }

        $text = $id[0] . ';' . implode(';', str_replace(';', '-', $_POST)) . PHP_EOL;
        
        // salva o registro dentro do arquivo
        $file = fopen('elvis_store.mme', 'a');

        fwrite($file, $text);

        fclose($file);
    } catch (Error $e) {
        $error = true;
    }

    require './templates/template-addemail.php';
