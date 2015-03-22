<?php
/* Empresa Controller
 * 2015-03-05
 * Created By OJBA
 * Last Modification 2015-03-05 19:25:00
 *`almacenes` (
  `idalmacenes` INT NOT NULL AUTO_INCREMENT,
  `rtn` VARCHAR(45) NULL,
  `descripcion` VARCHAR(45) NULL,
  `tipomaterial` VARCHAR(45) NULL,
  `subalmacen` VARCHAR(45) NULL,
  `direccion` VARCHAR(100) NULL,
  `telefono` BIGINT(10) NULL,
  `idsuperalmacen` BIGINT(8) NULL,
  `idempresa` VARCHAR(45) NULL,
  PRIMARY KEY (`idalmacenes`));
 *
 * 
 */
  require_once("libs/template_engine.php");

  require_once("models/almacenes.model.php");

  function run(){
    //htmlDatos, arreglo que contiene todas las substituciones
    // que se darán en la plantilla.

    $htmlDatos = array();
    $htmlDatos["almacenTitle"] = "";
    $htmlDatos["almacenMode"] = "";
    $htmlDatos["idalmacenes"] = "";
    $htmlDatos["rtn"]="";
    $htmlDatos["descripcion"]="";
    $htmlDatos["tipomaterial"]="";
    $htmlDatos["subalmacen"]="";
    $htmlDatos["direccion"]="";
    $htmlDatos["telefono"]="";
    $htmlDatos["idsuperalmacen"]="";
    $htmlDatos["idempresa"]="";
    $htmlDatos["disabled"]="";

    if(isset($_GET["acc"])){
      switch($_GET["acc"]){
        //Manejando si es un insert
        case "ins":
          $htmlDatos["almacenTitle"] = "Ingreso de Nuevo almacen";
          $htmlDatos["almacenMode"] = "ins";
          //se determina si es una acción del formulario
          if(isset($_POST["btnacc"])){
            $lastID = insertarAlmacen($_POST);
            if($lastID){
              redirectWithMessage("¡almacen Ingresado!","index.php?page=almacen&acc=upd&idalmacenes=".$lastID);
            }else{
              $htmlDatos["idalmacenes"] = $_POST["idalmacenes"];
              $htmlDatos["rtn"]=$_POST["rtn"];
              $htmlDatos["descripcion"]=$_POST["descripcion"];
              $htmlDatos["tipomaterial"]=$_POST["tipomaterial"];
              $htmlDatos["subalmacen"]=$_POST["subalmacen"];
              $htmlDatos["direccion"]=$_POST["direccion"];
              $htmlDatos["telefono"]=$_POST["telefono"];
              $htmlDatos["idsuperalmacen"]=$_POST["idsuperalmacen"];
              $htmlDatos["idempresa"]=$_POST["idempresa"];
            }
          }
          //si no es una acción del post se muestra los datos
          renderizar("almacen", $htmlDatos);
          break;
        //Manejando si es un Update
        case "upd":
          if(isset($_POST["btnacc"])){
            //implementar logica de guardado
            if(actualizarAlmacen($_POST)){
              //forzando a que se actualice con los datos de la db
              redirectWithMessage("¡Empresa Actualizada!","index.php?page=almacen&acc=upd&idalmacenes=".$_POST["idalmacenes"]);
            }
          }
          if(isset($_GET["idalmacenes"])){
            $almacen = obtenerAlmacen($_GET["idalmacenes"]);
            if($almacen){
              $htmlDatos["almacenTitle"] = "Actualizar ".$almacen["descripcion"];
              $htmlDatos["almacenMode"] = "upd";

              $htmlDatos["idalmacenes"] = $almacen["idalmacenes"];
              $htmlDatos["rtn"] = $almacen["rtn"];
              $htmlDatos["descripcion"] = $almacen["descripcion"];
              $htmlDatos["tipomaterial"]=$almacen["tipomaterial"];
              $htmlDatos["subalmacen"]=$almacen["subalmacen"];
              $htmlDatos["direccion"]=$almacen["direccion"];
              $htmlDatos["telefono"]=$almacen["telefono"];
              $htmlDatos["idsuperalmacen"]=$almacen["idsuperalmacen"];
              $htmlDatos["idempresa"]=$almacen["idempresa"];
              renderizar("almacen", $htmlDatos);
                        
            }else{
              redirectWithMessage("¡almacen No Encontrado!","index.php?page=almacenes");
            }
          }else{
            redirectWithMessage("¡almacen No Encontrado!","index.php?page=almacenes");
          }
          break;
        //Manejando un delete
        case "dlt":
          if(isset($_POST["btnacc"])){
            //implementar logica de guardado
            if(borrarAlmacen($_POST["idalmacenes"])){
              //forzando a que se actualice con los datos de la db
              redirectWithMessage("¡almacen Borrado!","index.php?page=almacenes");
            }
          }
          $almacen = obtenerAlmacen($_GET["idalmacenes"]);
          if($almacen){
            $htmlDatos["almacenTitle"] = "Actualizar ".$almacen["descripcion"];
            $htmlDatos["almacenMode"] = "dlt";
          
             $htmlDatos["idalmacenes"] = $almacen["idalmacenes"];
              $htmlDatos["rtn"]= $almacen["rtn"];
              $htmlDatos["descripcion"]=$almacen["descripcion"];
              $htmlDatos["tipomaterial"]=$almacen["tipomaterial"];
              $htmlDatos["subalmacen"]=$almacen["subalmacen"];
              $htmlDatos["direccion"]=$almacen["direccion"];
              $htmlDatos["telefono"]=$almacen["telefono"];
              $htmlDatos["idsuperalmacen"]=$almacen["idsuperalmacen"];
              $htmlDatos["idempresa"]=$almacen["idempresa"];
            $htmlDatos["disabled"]="disabled";
            renderizar("almacen", $htmlDatos);
          }else{
              redirectWithMessage("¡Almacen No Encontrado!","index.php?page=almacenes");
          }
          break;
        defualt:
          redirectWithMessage("¡Acción no permitida!","index.php?page=almacenes");
          break;
      }
    }


  }

  run();
?>
