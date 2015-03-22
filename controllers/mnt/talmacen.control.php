<?php
/* Empresa Controller
 * 2015-03-05
 * Created By OJBA
 * Last Modification 2015-03-05 19:25:00
 * idtiposAlmacen
 * descripcion
 */
  require_once("libs/template_engine.php");

  require_once("models/talmacenes.model.php");

  function run(){
    //htmlDatos, arreglo que contiene todas las substituciones
    // que se darán en la plantilla.

    $htmlDatos = array();
    $htmlDatos["talmacenesTitle"] = "";
    $htmlDatos["talmacenesMode"] = "";
    $htmlDatos["idtiposAlmacen"] = "";
    $htmlDatos["descripcion"]="";
      $htmlDatos["disabled"]="";

    if(isset($_GET["acc"])){
      switch($_GET["acc"]){
        //Manejando si es un insert
        case "ins":
          $htmlDatos["talmacenesTitle"] = "Ingreso de Nuevo tipo";
          $htmlDatos["talmacenesMode"] = "ins";
          //se determina si es una acción del formulario
          if(isset($_POST["btnacc"])){
            $lastID = insertarTalmacen($_POST);
            if($lastID){
              redirectWithMessage("¡Tipo Ingresado!","index.php?page=talmacen&acc=upd&idtiposAlmacen=".$lastID);
            }else{
              $htmlDatos["idtiposAlmacen"] = $_POST["idtiposAlmacen"];
              $htmlDatos["descripcion"]= $_POST["descripcion"];
                          }
          }
          //si no es una acción del post se muestra los datos
          renderizar("talmacen", $htmlDatos);
          break;
        //Manejando si es un Update
        case "upd":
          if(isset($_POST["btnacc"])){
            //implementar logica de guardado
            if(actualizarTalmacen($_POST)){
              //forzando a que se actualice con los datos de la db
              redirectWithMessage("¡Tipo Actualizado!","index.php?page=talmacen&acc=upd&idtiposAlmacen=".$_POST["idtiposAlmacen"]);
            }
          }
          if(isset($_GET["idtiposAlmacen"])){
            $talmacen = obtenerTalmacen($_GET["idtiposAlmacen"]);
            if($talmacen){
              $htmlDatos["talmacenesTitle"] = "Actualizar ".$talmacen["descripcion"];
              $htmlDatos["talmacenesMode"] = "upd";

              $htmlDatos["idtiposAlmacen"] = $talmacen["idtiposAlmacen"];
              $htmlDatos["descripcion"]= $talmacen["descripcion"];
             
              renderizar("talmacen", $htmlDatos);
            }else{
              redirectWithMessage("¡Tipo No Encontrado!","index.php?page=talmacenes");
            }
          }else{
            redirectWithMessage("¡Empresa No Encontrada!","index.php?page=talmacenes");
          }
          break;
        //Manejando un delete
        case "dlt":
          if(isset($_POST["btnacc"])){
            //implementar logica de guardado
            if(borrarTalmacen($_POST["idtiposAlmacen"])){
              //forzando a que se actualice con los datos de la db
              redirectWithMessage("¡Tipo Borrado!","index.php?page=talmacenes");
            }
          }
          $talmacen = obtenerTalmacen($_GET["idtiposAlmacen"]);
          if($talmacen){
            $htmlDatos["talmacenesTitle"] = "Actualizar ".$talmacen["descripcion"];
            $htmlDatos["talmacenesMode"] = "dlt";

            $htmlDatos["idtiposAlmacen"] = $talmacen["idtiposAlmacen"];
            $htmlDatos["descripcion"]= $talmacen["descripcion"];
            $htmlDatos["disabled"]="disabled";
            renderizar("talmacen", $htmlDatos);
          }else{
              redirectWithMessage("¡Tipo No Encontrado!","index.php?page=talmacenes");
          }
          break;
        defualt:
          redirectWithMessage("¡Acción no permitida!","index.php?page=talmacenes");
          break;
      }
    }


  }

  run();
?>
