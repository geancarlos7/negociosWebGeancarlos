<?php
/* Empresas Controller
 * 2015-03-05
 * Created By OJBA
 * Last Modification 2015-03-05 19:25:00
 */
  require_once("libs/template_engine.php");

  require_once("models/materiales.model.php");

  function run(){
    $materiales = array();
    $materiales = obtenerMateriales();
    renderizar("materiales", array("materiales" => $materiales));
  }
  run();
?>
