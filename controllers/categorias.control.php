<?php
/* Categorias Controller
 * 2015-03-05
 * Created By OJBA
 * Last Modification 2015-03-05 19:25:00
 */
  require_once("libs/template_engine.php");

  require_once("models/categorias.model.php");

  function run(){
    $categorias = array();
    $categorias = obtenerCategorias();
    renderizar("categorias", array("categorias" => $categorias));
  }

  run();
?>
