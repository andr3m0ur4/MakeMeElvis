<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Quero Ser Elvis - Remover Email</title>
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

        </div>

        <?php if ($success) : ?>
            <!-- Modal -->
            <div class="modal fade" id="modalSucessoRemocao" tabindex="-1" role="dialog" aria-labelledby="modalTitulo" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div id="modalCabecalho" class="modal-header text-success">
                            <h5 class="modal-title" id="modalTitulo">E-mail removido com sucesso!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="modalConteudo">
                            <p>Cliente removido: <?= $_POST['email'] ?></p>
                        </div>
                        <div class="modal-footer mb-3">
                            <button type="button" id="modalBtn" data-dismiss="modal" class="btn btn-success">Voltar</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="modal fade" id="modalErroRemocao" tabindex="-1" role="dialog" aria-labelledby="modalTitulo" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div id="modalCabecalho" class="modal-header text-danger">
                            <h5 class="modal-title" id="modalTitulo">E-mail não encontrado!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="modalConteudo">
                            Você deve preencher o campo com um e-mail válido!
                        </div>
                        <div class="modal-footer mb-3">
                            <button type="button" id="modalBtn" data-dismiss="modal" class="btn btn-danger">Voltar</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="js/make_me_elvis.js"></script>

    </body>
</html>