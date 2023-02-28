<?php
    include_once dirname(__FILE__)."/Clases/Votaciones.class.php";
    $votaciones = new Votaciones();
    $grados = $votaciones->verGrados();
    $resulConsejo = $votaciones->resulConsejo();
    $resulPersonero = $votaciones->resulPersonero();
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
        Bienvenido a las Elecciones Escolares <?php echo date('Y') ?>
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
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">
                    Tocame aqu&iacute;
                </span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                Elecciones Escolares <?php echo date('Y') ?> Jardin infantil Carrusel
            </a>
        </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Elija un Grado para poder empezar a Votar
                <small>Jardin infantil Carrusel</small>
                <button type="button" class="btn btn-success text-right btn-sm" type="button" data-toggle="modal" data-target="#resultados">Ver Resultados</button>
            </h1>
        </div>
    </div>
    <?php
        if(count($grados)>0) {
        foreach ($grados as $gra){
    ?>
            <div class="row">
                <div class="col-md-7">
                    <a href="#">
                        <img class="img-responsive img-thumbnail" src="Assets/images/<?php echo $gra[imagen]?>" style="width: 300px;" alt="<?php echo $gra[grado]; ?>">
                    </a>
                </div>
                <div class="col-md-5">
                    <h3><b>Grado:</b> <?php echo $gra[grado]; ?></h3>
                    <a class="btn btn-primary" href="Grado.php?grado=<?php echo $gra[idgrado]; ?>">
                        Ver Estudiantes para Grado: <?php echo $gra[grado]; ?>
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>

            <hr/>
    <?php
        }
    }
    ?>

    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; <b>DVLOPER</b> <?php echo date('Y'); ?></p>
            </div>
        </div>
    </footer>
</div>

<!-- Modal -->
<div class="modal fade" id="resultados" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    Resultados de las Votaciones
                </h4>
            </div>
            <div class="modal-body">
                <caption>
                    <b>
                        Consejo.
                    </b>
                </caption>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Numero de Votaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if(count($resulConsejo)>0){
                            foreach ($resulConsejo as $resCo){
                    ?>

                        <tr>
                            <td scope="row">
                                <b><?php echo $resCo[nombre];?></b>
                            </td>
                            <td>
                                <?php echo $resCo[resultados];?>
                            </td>
                        </tr>
                    <?php
                            }
                        }
                    ?>
                    </tbody>
                </table>
                <caption>
                    <b>
                        Personero.
                    </b>
                </caption>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Numero de Votaciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(count($resulPersonero)>0){
                        foreach ($resulPersonero as $resPe){
                            ?>

                            <tr>
                                <td scope="row">
                                    <b><?php echo $resPe[nombre];?></b>
                                </td>
                                <td>
                                    <?php echo $resPe[resultados];?>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>

<script src="Assets/js/jquery.js"></script>
<script src="Assets/js/bootstrap.min.js"></script>
</body>
</html>
