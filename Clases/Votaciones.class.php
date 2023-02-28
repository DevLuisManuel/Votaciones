<?php
class Votaciones{

    function __construct(){
        include_once dirname(__FILE__)."/Conexion.php";
        $conn = new Conexion();
        $this->fpdo = $conn->Conectar();
    }

    //Aqui vemos todos los grados
    public function verGrados(){
        $grado = $this->fpdo->from('grado')
            ->orderBy('idGrado ASC');
        return $grado;
    }

    //Aqui vemos el nombre del grado
    public function nomGrado($idGrado){
        $nomgrado = $this->fpdo->from('grado')
            ->where('idGrado = ?',$idGrado);
        return $nomgrado;
    }

    //Aqui Sacamos a los estudiantes
    public function estudiantes($idGrado){
        $estudiantes = $this->fpdo->from('estudiante')
            ->where('idGrado = ?',$idGrado)
            ->where('personero = ?',0);
        return $estudiantes;
    }
    //Aqui sacamos los personeros
    public function personero(){
        $estudiantes = $this->fpdo->from('personero as per')
            ->select('estu.nombre as nombre, estu.foto as foto')
            ->innerJoin('estudiante as estu on estu.idEstudiante = per.idEstudiante')
            ->orderBy('estu.idEstudiante ASC');
        return $estudiantes;
    }
    //Aqui Votamos
    public function votar($datos){
        $insert = $this->fpdo->insertInto('vota', $datos)->execute();
        return $insert;
    }
    //Aqui miramos el resultado del consejo
    public function resulConsejo(){
        $estudiantes = $this->fpdo->from('estudiante as estu')
            ->select('estu.idEstudiante,estu.nombre, count(per.idVota) as resultados')
            ->leftJoin('vota as per on estu.idEstudiante = per.idEstudiante')
            ->where('personero = ?',0)
            ->groupBy('estu.idEstudiante');
        return $estudiantes;
    }

    //Aqui miramos el resultado del consejo
    public function resulPersonero(){
        $estudiantes = $this->fpdo->from('estudiante as estu')
            ->select('estu.idEstudiante,estu.nombre, count(per.idVota) as resultados')
            ->innerJoin('vota as per on estu.idEstudiante = per.idEstudiante')
            ->where('personero = ?',1)
            ->groupBy('estu.idEstudiante');
        return $estudiantes;
    }
}
