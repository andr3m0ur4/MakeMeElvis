<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Quero Ser Elvis - Enviar Email</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>

        <div class="container mt-5">

            <img id="foto" src="image/blankface.jpg" width="161" height="350" alt="Foto">
            <img name="elvislogo" src="image/elvislogo.gif" width="229" height="32" border="0" alt="Make Me Elvis">
            <p>
                <strong>Privado:</strong> Para uso SOMENTE de Elmer<br />
                Escrever e enviar um email para os membros da lista de email.
            </p>
        <?php
        $subject = '';
        $text = '';
        if (isset($_POST['submit'])) {
            $from = 'andre.benedicto@etec.sp.gov.br';
            $subject = $_POST['subject'];
            $text = $_POST['elvismail'];
            $output_form = false;

            if ((empty($subject)) && (empty($text))) {
                //'Nós sabemos que tanto $subject e $text estão faltando';
                echo 'Você esqueceu do assunto e do corpo da mensagem.<br>';
                $output_form = true;
            }
            if ((empty($subject)) && (!empty($text))) {
                //'$subject está vazia';
                echo 'Você esqueceu do assunto...<br>';
                $output_form = true;
            }
            if ((!empty($subject)) && (empty($text))) {
                //$text está vazia
                echo 'Você esqueceu do corpo da mensagem..<br>';
                $output_form = true;
            }
            if ((!empty($subject)) && (!empty($text))) {
                //Tudo está certo, enviar emails
                $dbc = mysqli_connect('localhost', 'root', '', 'elvis_store')
                        or die('Erro ao se conectar com o servidor MySQL.');

                $query = "SELECT * FROM email_list";
                $result = mysqli_query($dbc, $query)
                        or die('Erro ao consultar o banco de dados.');

                while ($row = mysqli_fetch_array($result)) {
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];

                    $msg = "Dear $first_name $last_name,\n$text";

                    $to = $row['email'];

                    mail($to, $subject, $msg, 'From:' . $from);

                    echo 'Email enviado para: ' . $to . '<br>';
                }

                mysqli_close($dbc);
            }
        } else {
            $output_form = true;
        }
        if ($output_form) {
            ?>

            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <label for="subject">Assunto do email:</label><br>
                <input id="subject" name="subject" type="text" size="30" value="<?php echo $subject; ?>"/><br>
                <label for="elvismail">Mensagem do email:</label><br>
                <textarea id="elvismail" name="elvismail" rows="8" cols="40"><?php echo $text; ?></textarea><br>
                <input type="submit" name="submit" value="Submeter" />
            </form>

            <?php
        }
        ?>

        </div>
    </body>
</html>
