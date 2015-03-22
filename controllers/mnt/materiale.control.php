<?php
/* Empresa Controller
 * 2015-03-05
 * Created By OJBA
 * Last Modification 2015-03-05 19:25:00
 */
  require_once("libs/template_engine.php");

  require_once("models/materiales.model.php");

  function run(){
    //htmlDatos, arreglo que contiene todas las substituciones
    // que se darán en la plantilla.

    $htmlDatos = array();
    $htmlDatos["materialeTitle"] = "";
    $htmlDatos["materialeMode"] = "";
    $htmlDatos["idmateriales"] = "";
    $htmlDatos["descripcion"]="";
    $htmlDatos["estado"]="";
    $htmlDatos["actSelected"]="selected";
    $htmlDatos["inaSelected"]="";
    

    if(isset($_GET["acc"])){
      switch($_GET["acc"]){
        //Manejando si es un insert
        case "ins":
          $htmlDatos["materialeTitle"] = "Ingreso de un Nuevo Material";
          $htmlDatos["materialeMode"] = "ins";
          //se determina si es una acción del formulario
          if(isset($_POST["btnacc"])){
            $lastID = insertarmateriale($_POST);
            if($lastID){
              redirectWithMessage("¡material Ingresado!","index.php?page=materiale&acc=upd&idmateriales=".$lastID);
            }else{
              $htmlDatos["idmateriales"] = $_POST["idmateriales"];
              $htmlDatos["descripcion"]= $_POST["descripcion"];
              $htmlDatos["estado"]=$_POST["estado"];
              $htmlDatos["actSelected"]=($_POST["estado"] =="ACT")?"selected":"";
              $htmlDatos["inaSelected"]=($_POST["estado"] =="INA")?"selected":"";
                          }
          }
          //si no es una acción del post se muestra los datos
          renderizar("materiale", $htmlDatos);
          break;
        //Manejando si es un Update
        case "upd":
          if(isset($_POST["btnacc"])){
            //implementar logica de guardado
            if(actualizarmateriale($_POST)){
              //forzando a que se actualice con los datos de la db
              redirectWithMessage("¡material Actualizado!","index.php?page=materiale&acc=upd&idmateriales=".$_POST["idmateriales"]);
            }
          }
          if(isset($_GET["idmateriales"])){
            $materiale = obtenermateriale($_GET["idmateriales"]);
            if($materiale){
              $htmlDatos["materialeTitle"] = "Actualizar ".$materiale["descripcion"];
              $htmlDatos["materialeMode"] = "upd";

              //aqui
              
              $htmlDatos["idmateriales"] = $materiale["idmateriales"];
              $htmlDatos["descripcion"]= $materiale["descripcion"];
              $htmlDatos["estado"]=$materiale["estado"];
              $htmlDatos["actSelected"]=($materiale["estado"] =="ACT")?"selected":"";
              $htmlDatos["inaSelected"]=($materiale["estado"] =="INA")?"selected":"";
              
            renderizar("materiale", $htmlDatos);
            }else{
              redirectWithMessage("¡material No Encontrad!","index.php?page=materiales");
            }
          }else{
            redirectWithMessage("¡material No Encontrado!","index.php?page=materiales");
          }
          break;
        //Manejando un delete
        case "dlt":
          if(isset($_POST["btnacc"])){
            //implementar logica de guardado
            
            if(borrarMateriale($_POST["idmateriales"])){
              //forzando a que se actualice con los datos de la db
              redirectWithMessage("¡idmaterial Borrado!","index.php?page=materiales");
            }
          }
          $materiale = obtenermateriale($_GET["idmateriales"]);
          if($materiale){
            //aqui
            $htmlDatos["materialeTitle"] = "Actualizar ".$materiale["descripcion"];
            $htmlDatos["materialeMode"] = "dlt";

            $htmlDatos["idmateriales"] = $materiale["idmateriales"];
            $htmlDatos["descripcion"]= $materiale["descripcion"];
            $htmlDatos["estado"]=$materiale["estado"];
            $htmlDatos["actSelected"]=($materiale["estado"] =="ACT")?"selected":"";
            $htmlDatos["inaSelected"]=($materiale["estado"] =="INA")?"selected":"";
            $htmlDatos["disabled"]="disabled";
            renderizar("materiale", $htmlDatos);
          }else{
              redirectWithMessage("¡material No Encontrado!","index.php?page=materiales");
          }
          break;
        defualt:
          redirectWithMessage("¡Acción no permitida!","index.php?page=materiales");
          break;
      }
    }


  }

  run();
?>
