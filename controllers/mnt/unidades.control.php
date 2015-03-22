<?php
/* Categorias Controller
 * 2015-03-05
 * Created By OJBA
 * Last Modification 2015-03-05 19:25:00
 */
  require_once("libs/template_engine.php");

  require_once("models/unidades.model.php");

  function run(){
    $unidades = array();
    $unidades = obtenerUnidadesConPadre();
    renderizar("unidades", array("unidades" => $unidades));
  }

  run();
?>
