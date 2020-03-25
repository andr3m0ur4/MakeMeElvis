<?php

    $error = true;

    if (!empty($_POST)) {

        try {
            // abrir arquivo da aplicação
            $file = fopen('./file/elvis_store.mme', 'r');

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
            $file = fopen('./file/elvis_store.mme', 'a');

            fwrite($file, $text);

            fclose($file);

            $error = false;
        } catch (Error $e) {
            $error = true;
        }
    } else {
        header('Location: addemail.html');
    }

    require './templates/template-addemail.php';
