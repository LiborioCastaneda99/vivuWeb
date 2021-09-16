<?php

require_once "cursos/clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();

$tildes = $conexion->query("SET NAMES 'utf8'");

$res=mysqli_query($conexion,"SELECT C.nombre_grupo AS nombre_grupo, C.id 
FROM cursos C");


$v = [];

foreach ($res as $d) {
    $id = $d['id'];

    
    echo "Usuario Id => ".$d['nombre_grupo']." - Rol => ".$d['id']."<br>";

    if ($d['nombre_grupo'] == "Tecnología") {
        $nombre_grupo = 1;
        $res=mysqli_query($conexion,"UPDATE cursos SET id_grupo ='$nombre_grupo' WHERE id = $id");

    }else if ($d['nombre_grupo'] == "Salud Ocupacional") {
        $nombre_grupo = 2;
        $res=mysqli_query($conexion,"UPDATE cursos SET id_grupo ='$nombre_grupo' WHERE id = $id");

    }


    
}
