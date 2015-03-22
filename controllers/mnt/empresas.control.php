<?php
/* Empresas Controller
 * 2015-03-05
 * Created By OJBA
 * Last Modification 2015-03-05 19:25:00
 */
  require_once("libs/template_engine.php");

  require_once("models/empresas.model.php");

  function run(){
    $empresas = array();
    $empresas = obtenerEmpresas();
    renderizar("empresas", array("empresas" => $empresas));
  }

  run();
?>
