<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Quero Ser Elvis - Adicionar Email</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>

        <div class="container mt-5">

            <img id="foto" src="image/blankface.jpg" width="161" height="350" alt="Foto">
            <img name="elvislogo" src="image/elvislogo.gif" width="229" height="32" border="0" alt="Make Me Elvis">

            <?php if (!$error) : ?>
                <p>Cliente adicionado.</p>
            <?php endif ?>
        </div>

    </body>
</html>