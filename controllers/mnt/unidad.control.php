<?php
/* Category Controller
 * 2015-03-05
 * Created By OJBA
 * Last Modification 2015-03-05 19:25:00
 */
  require_once("libs/template_engine.php");

  require_once("models/unidades.model.php");

  function run(){
    //htmlDatos, arreglo que contiene todas las substituciones
    // que se darán en la plantilla.

    $htmlDatos = array();
    $htmlDatos["unidadTitle"] = "";
    $htmlDatos["unidadMode"] = "";
    $htmlDatos["undid"] = "";
    $htmlDatos["unddes"]="";
    $htmlDatos["undprnt"]="";
    $htmlDatos["undfprnt"]="";
    $htmlDatos["undest"]="";
    $htmlDatos["undtip"]="";
    $htmlDatos["unidadesPadre"] = obtenerUnidadesPadreSelect();
    $htmlDatos["unidadesTipo"] = obtenerUnidadesTipoSelected();
    $htmlDatos["actSelected"]="selected";
    $htmlDatos["inaSelected"]="";
    $htmlDatos["desSelected"]="";
    $htmlDatos["disabled"]="";

    /*
    `undid`
    `unddes`
    `undprnt`
    `undfprnt`
    `undest`
    `undtip`
    */

    if(isset($_GET["acc"])){
      switch($_GET["acc"]){
        //Manejando si es un insert
        case "ins":
          $htmlDatos["unidadTitle"] = "Ingreso de Nueva Unidad";
          $htmlDatos["unidadMode"] = "ins";
          //se determina si es una acción del formulario
          if(isset($_POST["btnacc"])){
            $lastID = insertarUnidad($_POST);
            if($lastID){
              redirectWithMessage("¡Unidad Ingresada!","index.php?page=unidad&acc=upd&undid=".$lastID);
            }else{
              //Se obtiene los datos que estaban en el post
              $htmlDatos["undid"] = $_POST["undid"];
              $htmlDatos["unddes"]=$_POST["unddes"];
              $htmlDatos["undprnt"]=$_POST["undprnt"];
              $htmlDatos["undfprnt"]=$_POST["undfprnt"];
              $htmlDatos["undest"]=$_POST["undest"];
              $htmlDatos["actSelected"]=($_POST["undest"] =="ACT")?"selected":"";
              $htmlDatos["inaSelected"]=($_POST["undest"] =="INA")?"selected":"";
              $htmlDatos["desSelected"]=($_POST["undest"] =="DES")?"selected":"";
              $htmlDatos["undtip"]=$_POST["undtip"];

              $htmlDatos["unidadesPadre"] = obtenerUnidadesPadreSelect(0,$_POST["undprnt"]);
              $htmlDatos["unidadesTipo"] = obtenerUnidadesTipoSelected($_POST["undtip"]);

            }
          }
          //si no es una acción del post se muestra los datos
          renderizar("unidad", $htmlDatos);
          break;
        //Manejando si es un Update
        case "upd":
          if(isset($_POST["btnacc"])){
            //implementar logica de guardado
            if(actualizarUnidad($_POST)){
              //forzando a que se actualice con los datos de la db
              redirectWithMessage("¡Unidad Actualizada!","index.php?page=unidad&acc=upd&undid=".$_POST["undid"]);
            }
          }
          if(isset($_GET["undid"])){
            $unidad = obtenerUnidad($_GET["undid"]);
            if($unidad){
              $htmlDatos["unidadTitle"] = "Actualizar ".$unidad["unddes"];
              $htmlDatos["unidadMode"] = "upd";
              $htmlDatos["undid"] = $unidad["undid"];
              $htmlDatos["unddes"]=$unidad["unddes"];
              $htmlDatos["undprnt"]=$unidad["undprnt"];
              $htmlDatos["undfprnt"]=$unidad["undfprnt"];
              $htmlDatos["undest"]=$unidad["undest"];
              $htmlDatos["actSelected"]=($unidad["undest"] =="ACT")?"selected":"";
              $htmlDatos["inaSelected"]=($unidad["undest"] =="INA")?"selected":"";
              $htmlDatos["desSelected"]=($unidad["undest"] =="DES")?"selected":"";
              $htmlDatos["undtip"]=$unidad["undtip"];

              $htmlDatos["unidadesPadre"] = obtenerUnidadesPadreSelect($unidad["undid"],$unidad["undprnt"]);
              $htmlDatos["unidadesTipo"] = obtenerUnidadesTipoSelected($unidad["undtip"]);

              renderizar("unidad", $htmlDatos);
            }else{
              redirectWithMessage("¡Unidad No Encontrada!","index.php?page=unidades");
            }
          }else{
            redirectWithMessage("¡Unidad No Encontrada!","index.php?page=unidades");
          }
          break;
        //Manejando un delete
        case "dlt":
        if(isset($_POST["btnacc"])){
          //implementar logica de guardado
          if(borrarUnidad($_POST["undid"])){
            //forzando a que se actualice con los datos de la db
            redirectWithMessage("¡Unidad Borrada!","index.php?page=unidades");
          }
        }
          if(isset($_GET["undid"])){
            $unidad = obtenerUnidad($_GET["undid"]);
            if($unidad){
              $htmlDatos["unidadTitle"] = "¿Desea borrar ".$unidad["unddes"] . "?";
              $htmlDatos["unidadMode"] = "dlt";
              $htmlDatos["undid"]=$unidad["undid"];
              $htmlDatos["unddes"]=$unidad["unddes"];
              $htmlDatos["undprnt"]=$unidad["undprnt"];
              $htmlDatos["undfprnt"]=$unidad["undfprnt"];
              $htmlDatos["undest"]=$unidad["undest"];
              $htmlDatos["actSelected"]=($unidad["undest"] =="ACT")?"selected":"";
              $htmlDatos["inaSelected"]=($unidad["undest"] =="INA")?"selected":"";
              $htmlDatos["desSelected"]=($unidad["undest"] =="DES")?"selected":"";
              $htmlDatos["undtip"]=$unidad["undtip"];

              $htmlDatos["unidadesPadre"] = obtenerUnidadesPadreSelect($unidad["undid"],$unidad["undprnt"]);
              $htmlDatos["unidadesTipo"] = obtenerUnidadesTipoSelected($unidad["undtip"]);

              $htmlDatos["disabled"]='disabled="disabled"';
              renderizar("unidad", $htmlDatos);
            }else{
              redirectWithMessage("¡Unidad No Encontrada!","index.php?page=unidades");
            }
          }else{
            redirectWithMessage("¡Unidad No Encontrada!","index.php?page=unidades");
          }
          break;
        defualt:
          redirectWithMessage("¡Acción no permitida!","index.php?page=unidades");
          break;
      }
    }


  }

  run();
?>
