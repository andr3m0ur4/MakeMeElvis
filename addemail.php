<?php

    require 'Contato.php';

    $contato = new Contato();

    /*foreach ($_POST as $key => $value) {
        $contato -> __set($key, $value);
    }*/

    $error = false;

    try {
        $file = fopen('elvis_store.mme', 'r');

        $last_line = '';

        while (($line = fgets($file)) != false) {
            $last_line = $line;
        }

        fclose($file);

        $id = explode(';', $last_line);

        if (!$id[0]) {
            $id[0] = 1;
        } else {
            $id[0]++;
        }

        $text = $id[0] . ';' . implode(';', str_replace(';', '-', $_POST)) . PHP_EOL;
        
        $file = fopen('elvis_store.mme', 'a');

        fwrite($file, $text);

        fclose($file);
    } catch (Error $e) {
        $error = true;
    }

    require './templates/template-addemail.php';
