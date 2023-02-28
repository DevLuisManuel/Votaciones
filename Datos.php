<?php
include_once dirname(__FILE__)."/Clases/Votaciones.class.php";
/**
 * Created by PhpStorm.
 * User: DevLuisManuel
 * Date: 23/03/17
 * Time: 10:13 PM
 */

if(isset($_POST)){
    $votaciones = new Votaciones();
    $datos = array(
        'idEstudiante'
            =>
                $_POST['idEstudiante']
    );
    if($votaciones->votar($datos))
        return true;
    else
        return false;
}