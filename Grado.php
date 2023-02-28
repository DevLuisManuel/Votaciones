<?php
include_once dirname(__FILE__)."/Clases/Votaciones.class.php";
$votaciones = new Votaciones();
$nomGrado = $votaciones->nomGrado($_GET['grado']);
if(count($nomGrado)>0){
    $estudiantes = $votaciones->estudiantes($_GET['grado']);
    $personero = $votaciones->personero();
    foreach ($nomGrado as $nom) {
        ?>
        <!DOCTYPE html>
        <html lang="es-Co">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="">
            <title>
                Grado <?php echo $nom[grado]; ?>
            </title>
            <link href="Assets/css/bootstrap.min.css" rel="stylesheet">
            <link href="Assets/css/1-col-portfolio.css" rel="stylesheet">
            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->
        </head>
        <body>

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">
                    Tocame aqu&iacute;
                </span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">
                        Regresar al Inicio
                    </a>
                </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Elije un representante
                        <small><b>Grado:</b> <?php echo $nom[grado]; ?></small>
                    </h1>
                </div>
            </div>
            <div class="row">
            <?php
            if (count($estudiantes) > 0) {
                foreach ($estudiantes as $estu) {
                    ?>
                        <div class="col-md-6">
                            <div class="thumbnail">
                                <img onclick="confirmar(<?php echo $estu[idestudiante]; ?>,'<?php echo $estu[nombre]; ?>')" src="Assets/images/<?php echo $estu[foto]; ?>" style="width: 300px;" alt="<?php echo $estu[nombre]; ?>" alt="<?php echo $estu[nombre]; ?>">
                                <div class="caption">
                                    <h3 class="text-center"><b><?php echo $estu[nombre] ?></b></h3>
                                </div>
                            </div>
                        </div>

                    <?php
                }
            }else{
            ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger" role="alert">
                            <h1 class="text-center">
                                <b>No se a configurado ning&uacute;n representante</b>
                            </h1>
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>
            </div>
            <hr/>
            <!--
                //-> Aqui el personero
            -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Elija su personero
                        <small><b>Grado:</b> <?php echo $nom[grado]; ?></small>
                    </h1>
                </div>
            </div>
            <div class="row">
            <?php
            if (count($personero) > 0) {
                foreach ($personero as $per) {
                    ?>

                        <div class="col-md-6">
                            <div class="thumbnail">
                                <img onclick="confirmar(<?php echo $per[idestudiante]; ?>,'<?php echo $per[nombre]; ?>')" src="Assets/images/<?php echo $per[foto]; ?>" style="width: 300px;" alt="<?php echo $per[nombre]; ?>" alt="<?php echo $per[nombre]; ?>">
                                <div class="caption">
                                    <h3 class="text-center"><b><?php echo $per[nombre] ?></b></h3>
                                </div>
                            </div>
                        </div>
                    <?php
                }
            }else{
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger" role="alert">
                            <h1 class="text-center">
                                <b>No se a configurado ning&uacute;n Personero</b>
                            </h1>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
            </div>
            <hr/>
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright &copy; <b>DVLOPER</b> <?php echo date('Y'); ?></p>
                    </div>
                </div>
            </footer>
        </div>

        <div class="modal fade" id="terminadoOk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">
                            Voto realizado con éxito
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-success" role="alert">
                            <h1 class="text-center">
                                <b>Voto realizado con éxito</b>
                            </h1>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="Assets/js/jquery.js"></script>
        <script src="Assets/js/bootstrap.min.js"></script>
        <script src="Assets/js/inicio.js"></script>
        </body>
        </html>
        <?php
    }
}
?>