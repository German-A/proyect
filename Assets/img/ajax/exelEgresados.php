<?php

require_once "../modelos/conexion.php";

$tipo       = $_FILES['dataCliente']['type'];
$tamanio    = $_FILES['dataCliente']['size'];
$archivotmp = $_FILES['dataCliente']['tmp_name'];

/*importacion de librerias*/ 
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

//$nombreArchivo = 'oficiosEmitidos.xlsx';
/*nombre del Archivo: vamos a cargar el archivo para poderr leer*/ 
$documento=IOFactory::load($archivotmp);
/*numero de pestañas a leer*/
$totalHojas = $documento->getSheetCount();
/*recorrido por hoja*/
//for($indiceHoja=0;$indiceHoja<$totalHojas;$indiceHoja++){
$hojaActual = $documento->getSheet(0); /* el 0 por que la hoja es la numero 0*/
//}

/*calcular cuantas filas tienen informacion (para que no lea todas las files que puede contener la hoja)  */
$numeroFilas= $hojaActual->getHighestDataRow();
/*ultima letra con datos */
$letra=$hojaActual->getHighestDataColumn();

$numeroLetra=Coordinate::columnIndexFromString($letra);

$cantidadEgresado=0;

for($indiceFila = 2; $indiceFila<=$numeroFilas;$indiceFila++){

    $valorA = $hojaActual->getCellByColumnAndRow(1,$indiceFila);
        /*numeroMatricula*/
    $valorB = $hojaActual->getCellByColumnAndRow(2,$indiceFila);
        /*ApellidoPaterno*/
    $valorC = $hojaActual->getCellByColumnAndRow(3,$indiceFila);
        /*ApellidoMaterno*/
    $valorD = $hojaActual->getCellByColumnAndRow(4,$indiceFila);
        /*nombres*/
    $valorE = $hojaActual->getCellByColumnAndRow(5,$indiceFila);
        /*dni,contrasenia*/
    $valorF = $hojaActual->getCellByColumnAndRow(6,$indiceFila);
        /*direccion*/
    $valorG = $hojaActual->getCellByColumnAndRow(7,$indiceFila);
        /*telefonoFijo*/
    $valorH = $hojaActual->getCellByColumnAndRow(8,$indiceFila);
        /*celular*/
    $valorI = $hojaActual->getCellByColumnAndRow(9,$indiceFila);
        /*email*/
    $valorJ = $hojaActual->getCellByColumnAndRow(10,$indiceFila);
        /*sexo*/
    $valorK = $hojaActual->getCellByColumnAndRow(11,$indiceFila);
        /*idEscuela*/
    $valorL = $hojaActual->getCellByColumnAndRow(12,$indiceFila);
        /*idSede*/

    $stmt2 = Conexion::conectar()->prepare("SELECT Dni FROM usuario where Dni = $valorE");
    $stmt2->execute();
 
    /*buscar si hay el dni*/
    while ($fila = $stmt2->fetch(PDO::FETCH_NAMED)) {
        $filadni = $fila['Dni'];
    }

    if($filadni==null){
        
        $cantidadEgresado++;
        $stmt3 = Conexion::conectar()->
        prepare("INSERT INTO usuario(ApellidoP,ApellidoM,Nombres,Dni,Celular,Clave,Correo,IdRol)
        VALUES ('$valorB','$valorC','$valorD','$valorE','$valorH',sha2($valorE,256),'$valorI',3);");
        $stmt3->execute();

        /*ultimo usuario*/
        $stmt4 = Conexion::conectar()->prepare("SELECT Idusuario FROM usuario ORDER BY Idusuario DESC LIMIT 1");
        $stmt4->execute();
     
        while ($fila = $stmt4->fetch(PDO::FETCH_NAMED)) {
            $Idusuario = $fila['Idusuario'];
        }
      
        $stmt5 = Conexion::conectar()->
        prepare("INSERT INTO egresado(numeroMatricula,direccion,telefonoFijo,email,sexo,idEscuela,idSede,idUsuario) VALUES
        ('$valorA','$valorF','$valorG','$valorI','$valorJ','$valorK','$valorL','$Idusuario')");
        $stmt5->execute();
    }

}
echo $cantidadEgresado;

