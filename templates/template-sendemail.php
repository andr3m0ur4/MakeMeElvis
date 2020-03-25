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

        <div class="container my-5">

            <nav class="navbar navbar-expand-sm bg-light navbar-light">
                <!-- Brand/logo -->
                <a class="navbar-brand" href="#">
                    <img src="image/elvislogo.gif" width="229" height="32" border="0" alt="Make Me Elvis">
                </a>
              
                <!-- Links -->
                <ul class="navbar-nav ml-5">
                    <li class="nav-item">
                        <a class="nav-link" href="./addemail.html">Adicionar e-mail</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./removeemail.html">Remover e-mail</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./sendemail.php">Enviar e-mail</a>
                    </li>
                </ul>
            </nav>

            <img id="foto" src="image/blankface.jpg" width="161" height="350" alt="Foto" class="d-none d-sm-inline">
            <p class="mt-3">
                <strong>Privado:</strong> Para uso SOMENTE de Elmer<br>
                Escrever e enviar um email para os membros da lista de email.
            </p>

            <div class="col">
                <form method="post" id="myForm">
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label">E-mail</label>
                        <div class="col-md-6">
                            <select id="email" name="email" class="form-control">
                                <option value="">Escolha o e-mail...</option>
                                <?php foreach ($emails as $email) : ?>
                                    <option value="<?= $email ?>"><?= $email ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="subject" class="col-md-4 col-form-label">Assunto do email:</label>
                        <div class="col-md-6">
                            <input id="subject" name="subject" type="text" size="30" class="form-control" placeholder="Digite o assunto">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="elvismail" class="col-md-4 col-form-label">Mensagem do email:</label>
                        <div class="col-md-6">
                            <textarea id="elvismail" name="elvismail" rows="8" cols="40" class="form-control" placeholder="Digite a mensagem do e-mail aqui."></textarea>
                        </div>
                    </div>

                    <button id="enviarBtn" type="button" class="btn btn-primary btn-lg">Enviar</button>
                </form>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalEmail" tabindex="-1" role="dialog" aria-labelledby="modalTitulo" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div id="modalCabecalho">
                        <h5 class="modal-title" id="modalTitulo"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modalConteudo">
                        <?= $description_status ?>
                    </div>
                    <div class="modal-footer mb-3">
                        <button type="button" id="modalBtn" data-dismiss="modal"></button>
                    </div>
                </div>
            </div>
        </div>

        <?php if ($status == 1) : ?>
            <div id="success"></div>
        <?php elseif ($status == 2) : ?>
            <div id="error"></div>
        <?php endif ?>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="js/make_me_elvis.js"></script>
        
    </body>
</html>