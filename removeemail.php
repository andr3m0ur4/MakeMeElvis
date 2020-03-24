<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Quero Ser Elvis - Remover Email</title>
        <link href="style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        $dbc = mysqli_connect('localhost', 'root', '', 'elvis_store')
                or die('Erro ao se conectar com o servidor MySQL.');
        
        $email = $_POST['email'];
        
        $query = "DELETE FROM email_list WHERE email = '$email'";
        
        mysqli_query($dbc, $query)
                or die('Erro ao consultar o banco de dados');
        
        echo 'Cliente removido: ' . $email;
        
        mysqli_close($dbc);
        ?>
    </body>
</html>
