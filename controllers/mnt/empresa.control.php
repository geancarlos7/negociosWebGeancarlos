<?php
/* Empresa Controller
 * 2015-03-05
 * Created By OJBA
 * Last Modification 2015-03-05 19:25:00
 */
  require_once("libs/template_engine.php");

  require_once("models/empresas.model.php");

  function run(){
    //htmlDatos, arreglo que contiene todas las substituciones
    // que se darán en la plantilla.

    $htmlDatos = array();
    $htmlDatos["empresaTitle"] = "";
    $htmlDatos["empresaMode"] = "";
    $htmlDatos["empresaId"] = "";
    $htmlDatos["empdsc"]="";
    $htmlDatos["emprtn"]="";
    $htmlDatos["empdir"]="";
    $htmlDatos["emptel"]="";
    $htmlDatos["emptel2"]="";
    $htmlDatos["empurl"]="";
    $htmlDatos["empest"]="";
    $htmlDatos["actSelected"]="selected";
    $htmlDatos["inaSelected"]="";
    $htmlDatos["empctc"]="";
    $htmlDatos["emptip"]="";
    $htmlDatos["srvSelected"]="";
    $htmlDatos["rtlSelected"]="selected";
    $htmlDatos["wrhSelected"]="";
    $htmlDatos["disabled"]="";

    if(isset($_GET["acc"])){
      switch($_GET["acc"]){
        //Manejando si es un insert
        case "ins":
          $htmlDatos["empresaTitle"] = "Ingreso de Nueva Empresa";
          $htmlDatos["empresaMode"] = "ins";
          //se determina si es una acción del formulario
          if(isset($_POST["btnacc"])){
            $lastID = insertarEmpresa($_POST);
            if($lastID){
              redirectWithMessage("¡Empresa Ingresada!","index.php?page=empresa&acc=upd&empresaId=".$lastID);
            }else{
              $htmlDatos["empresaId"] = $_POST["empresaId"];
              $htmlDatos["empdsc"]= $_POST["empdsc"];
              $htmlDatos["emprtn"]=$_POST["emprtn"];
              $htmlDatos["empdir"]=$_POST["empdir"];
              $htmlDatos["emptel"]=$_POST["emptel"];
              $htmlDatos["emptel2"]=$_POST["emptel2"];
              $htmlDatos["empurl"]=$_POST["empurl"];
              $htmlDatos["empest"]=$_POST["empest"];
              $htmlDatos["actSelected"]=($_POST["empest"] =="ACT")?"selected":"";
              $htmlDatos["inaSelected"]=($_POST["empest"] =="INA")?"selected":"";
              $htmlDatos["empctc"]=$_POST["empctc"];
              $htmlDatos["emptip"]=$_POST["emptip"];
              $htmlDatos["srvSelected"]=($_POST["emptip"] =="SRV")?"selected":"";
              $htmlDatos["rtlSelected"]=($_POST["emptip"] =="RTL")?"selected":"";
              $htmlDatos["wrhSelected"]=($_POST["emptip"] =="WRH")?"selected":"";
            }
          }
          //si no es una acción del post se muestra los datos
          renderizar("empresa", $htmlDatos);
          break;
        //Manejando si es un Update
        case "upd":
          if(isset($_POST["btnacc"])){
            //implementar logica de guardado
            if(actualizarEmpresa($_POST)){
              //forzando a que se actualice con los datos de la db
              redirectWithMessage("¡Empresa Actualizada!","index.php?page=empresa&acc=upd&empresaId=".$_POST["empresaId"]);
            }
          }
          if(isset($_GET["empresaId"])){
            $empresa = obtenerEmpresa($_GET["empresaId"]);
            if($empresa){
              $htmlDatos["empresaTitle"] = "Actualizar ".$empresa["empdsc"];
              $htmlDatos["empresaMode"] = "upd";

              $htmlDatos["empresaId"] = $empresa["empresaId"];
              $htmlDatos["empdsc"]= $empresa["empdsc"];
              $htmlDatos["emprtn"]=$empresa["emprtn"];
              $htmlDatos["empdir"]=$empresa["empdir"];
              $htmlDatos["emptel"]=$empresa["emptel"];
              $htmlDatos["emptel2"]=$empresa["emptel2"];
              $htmlDatos["empurl"]=$empresa["empurl"];
              $htmlDatos["empest"]=$empresa["empest"];
              $htmlDatos["actSelected"]=($empresa["empest"] =="ACT")?"selected":"";
              $htmlDatos["inaSelected"]=($empresa["empest"] =="INA")?"selected":"";
              $htmlDatos["empctc"]=$empresa["empctc"];
              $htmlDatos["emptip"]=$empresa["emptip"];
              $htmlDatos["srvSelected"]=($empresa["emptip"] =="SRV")?"selected":"";
              $htmlDatos["rtlSelected"]=($empresa["emptip"] =="RTL")?"selected":"";
              $htmlDatos["wrhSelected"]=($empresa["emptip"] =="WRH")?"selected":"";


              renderizar("empresa", $htmlDatos);
            }else{
              redirectWithMessage("¡Empresa No Encontrada!","index.php?page=empresas");
            }
          }else{
            redirectWithMessage("¡Empresa No Encontrada!","index.php?page=empresas");
          }
          break;
        //Manejando un delete
        case "dlt":
          if(isset($_POST["btnacc"])){
            //implementar logica de guardado
            if(borrarEmpresa($_POST["empresaId"])){
              //forzando a que se actualice con los datos de la db
              redirectWithMessage("¡Empresa Borrada!","index.php?page=empresas");
            }
          }
          $empresa = obtenerEmpresa($_GET["empresaId"]);
          if($empresa){
            $htmlDatos["empresaTitle"] = "Actualizar ".$empresa["empdsc"];
            $htmlDatos["empresaMode"] = "dlt";

            $htmlDatos["empresaId"] = $empresa["empresaId"];
            $htmlDatos["empdsc"]= $empresa["empdsc"];
            $htmlDatos["emprtn"]=$empresa["emprtn"];
            $htmlDatos["empdir"]=$empresa["empdir"];
            $htmlDatos["emptel"]=$empresa["emptel"];
            $htmlDatos["emptel2"]=$empresa["emptel2"];
            $htmlDatos["empurl"]=$empresa["empurl"];
            $htmlDatos["empest"]=$empresa["empest"];
            $htmlDatos["actSelected"]=($empresa["empest"] =="ACT")?"selected":"";
            $htmlDatos["inaSelected"]=($empresa["empest"] =="INA")?"selected":"";
            $htmlDatos["empctc"]=$empresa["empctc"];
            $htmlDatos["emptip"]=$empresa["emptip"];
            $htmlDatos["srvSelected"]=($empresa["emptip"] =="SRV")?"selected":"";
            $htmlDatos["rtlSelected"]=($empresa["emptip"] =="RTL")?"selected":"";
            $htmlDatos["wrhSelected"]=($empresa["emptip"] =="WRH")?"selected":"";
            $htmlDatos["disabled"]="disabled";
            renderizar("empresa", $htmlDatos);
          }else{
              redirectWithMessage("¡Empresa No Encontrada!","index.php?page=empresas");
          }
          break;
        defualt:
          redirectWithMessage("¡Acción no permitida!","index.php?page=empresas");
          break;
      }
    }


  }

  run();
?>
