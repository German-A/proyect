<?php
require_once("conexion.php");


$stmt = Conexion::conectar()->prepare("SELECT count(IdManuales) cant FROM manuales where Habilitado = 1 order by FechaRegistro desc");
$stmt->execute();
$fila =$stmt->fetch();

$cantidad =$fila['cant'];

$ubicacionTemporal = $_FILES['archivoSubido']['tmp_name'];
$nombre = $_FILES['archivoSubido']['name'];
$nuevonombre =$cantidad. $nombre ;

$nombreArchivo = trim($_POST['nombreArchivo']);

if ($cantidad == null) {
  $cantidad = 0;
} else {
  $cantidad++;
}


$stmt = Conexion::conectar()->prepare("SELECT count(IdManuales) cant FROM manuales where Habilitado = 1 order by FechaRegistro desc");
$stmt->execute();
$fila =$stmt->fetch();



if(!file_exists('../../Assets/archivos/manuales/')){
  mkdir('../../Assets/archivos/manuales/',0777,true);
  if(file_exists('../../Assets/archivos/manuales/')){
    if(move_uploaded_file($ubicacionTemporal,'../../Assets/archivos/manuales/'.$nuevonombre)){

        $stmt = Conexion::conectar()->prepare("INSERT INTO manuales(Nombre,NombreArchivo,Posicion)
        VALUES ('$nombreArchivo','$nuevonombre','$cantidad');");
        $stmt->execute();   
        
      echo "guardado con exito";
    }else{
      echo "no se pudo guardar";
    }
  }
}else{
  if(move_uploaded_file($ubicacionTemporal,'../../Assets/archivos/manuales/'.$nuevonombre)){
      $stmt = Conexion::conectar()->prepare("INSERT INTO manuales(Nombre,NombreArchivo,Posicion)
      VALUES ('$nombreArchivo','$nuevonombre','$cantidad');");
      $stmt->execute();
     
    echo "guardado con exito";
  }else{
    echo "no se pudo guardar";
  }  
}
