<?php
/* Empresas Controller
 * 2015-03-05
 * Created By OJBA
 * Last Modification 2015-03-05 19:25:00
 */
  require_once("libs/template_engine.php");

  require_once("models/talmacenes.model.php");

  function run(){
    $talmacenes = array();
    $talmacenes = obtenerTalmacenes();
    renderizar("talmacenes", array("talmacenes" => $talmacenes));
  }

  run();
?>
