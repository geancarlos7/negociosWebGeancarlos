<?php
/* Category Controller
 * 2015-03-05
 * Created By OJBA
 * Last Modification 2015-03-05 19:25:00
 */
  require_once("libs/template_engine.php");

  require_once("models/categorias.model.php");

  function run(){
    //htmlDatos, arreglo que contiene todas las substituciones
    // que se darán en la plantilla.

    $htmlDatos = array();
    $htmlDatos["categoryTitle"] = "";
    $htmlDatos["categoryMode"] = "";
    $htmlDatos["ctgid"] = "";
    $htmlDatos["ctgdsc"]="";
    $htmlDatos["ctgest"]="";
    $htmlDatos["actSelected"]="selected";
    $htmlDatos["inaSelected"]="";
    $htmlDatos["disabled"]="";

    if(isset($_GET["acc"])){
      switch($_GET["acc"]){
        //Manejando si es un insert
        case "ins":
          $htmlDatos["categoryTitle"] = "Ingreso de Nueva Categoría";
          $htmlDatos["categoryMode"] = "ins";
          //se determina si es una acción del formulario
          if(isset($_POST["btnacc"])){
            $lastID = insertarCategoria($_POST);
            if($lastID){
              redirectWithMessage("¡Categoría Ingresada!","index.php?page=category&acc=upd&ctgid=".$lastID);
            }else{
              //Se obtiene los datos que estaban en el post
              $htmlDatos["ctgid"] = $_POST["ctgid"];
              $htmlDatos["ctgdsc"]=$_POST["ctgdsc"];
              $htmlDatos["ctgest"]=$_POST["ctgest"];
              $htmlDatos["actSelected"]=($_POST["ctgest"] =="ACT")?"selected":"";
              $htmlDatos["inaSelected"]=($_POST["ctgest"] =="INA")?"selected":"";
            }
          }
          //si no es una acción del post se muestra los datos
          renderizar("category", $htmlDatos);
          break;
        //Manejando si es un Update
        case "upd":
          if(isset($_POST["btnacc"])){
            //implementar logica de guardado
            if(actualizarCategoria($_POST)){
              //forzando a que se actualice con los datos de la db
              redirectWithMessage("¡Categoría Actualizada!","index.php?page=category&acc=upd&ctgid=".$_POST["ctgid"]);
            }
          }
          if(isset($_GET["ctgid"])){
            $categoria = obtenerCategoria($_GET["ctgid"]);
            if($categoria){
              $htmlDatos["categoryTitle"] = "Actualizar ".$categoria["ctgdsc"];
              $htmlDatos["categoryMode"] = "upd";
              $htmlDatos["ctgid"] = $categoria["ctgid"];
              $htmlDatos["ctgdsc"]=$categoria["ctgdsc"];
              $htmlDatos["ctgest"]=$categoria["ctgest"];
              $htmlDatos["actSelected"]=($categoria["ctgest"] =="ACT")?"selected":"";
              $htmlDatos["inaSelected"]=($categoria["ctgest"] =="INA")?"selected":"";
              renderizar("category", $htmlDatos);
            }else{
              redirectWithMessage("¡Categoría No Encontrada!","index.php?page=categorias");
            }
          }else{
            redirectWithMessage("¡Categoría No Encontrada!","index.php?page=categorias");
          }
          break;
        //Manejando un delete
        case "dlt":
        if(isset($_POST["btnacc"])){
          //implementar logica de guardado
          if(borrarCategoria($_POST["ctgid"])){
            //forzando a que se actualice con los datos de la db
            redirectWithMessage("¡Categoría Borrada!","index.php?page=categorias");
          }
        }
          if(isset($_GET["ctgid"])){
            $categoria = obtenerCategoria($_GET["ctgid"]);
            if($categoria){
              $htmlDatos["categoryTitle"] = "¿Desea borrar ".$categoria["ctgdsc"] . "?";
              $htmlDatos["categoryMode"] = "dlt";
              $htmlDatos["ctgid"] = $categoria["ctgid"];
              $htmlDatos["ctgdsc"]=$categoria["ctgdsc"];
              $htmlDatos["ctgest"]=$categoria["ctgest"];
              $htmlDatos["actSelected"]=($categoria["ctgest"] =="ACT")?"selected":"";
              $htmlDatos["inaSelected"]=($categoria["ctgest"] =="INA")?"selected":"";
              $htmlDatos["disabled"]='disabled="disabled"';
              renderizar("category", $htmlDatos);
            }else{
              redirectWithMessage("¡Categoría No Encontrada!","index.php?page=categorias");
            }
          }else{
            redirectWithMessage("¡Categoría No Encontrada!","index.php?page=categorias");
          }
          break;
        defualt:
          redirectWithMessage("¡Acción no permitida!","index.php?page=categorias");
          break;
      }
    }


  }

  run();
?>
