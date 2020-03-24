<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Quero Ser Elvis - Adicionar Email</title>
        <link href="style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        $dbc = mysqli_connect('localhost', 'root', '', 'elvis_store')
                or die('Erro ao se conectar com o servidor MySQL server.');
        
        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $email = $_POST['email'];
        
        $query = "INSERT INTO email_list (first_name, last_name, email) " .
                "VALUES ('$first_name', '$last_name', '$email')";
        
        mysqli_query($dbc, $query)
                or die('Erro ao acessar o banco de dados');
        
        echo 'Cliente adicionado.';
        
        mysqli_close($dbc);
        ?>
    </body>
</html>
