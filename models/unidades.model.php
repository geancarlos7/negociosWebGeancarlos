<?php
    //modelo de datos de unidades
    /*
    `undid`
    `unddes`
    `undprnt`
    `undfprnt`
    `undest`
    `undtip`
    */

    require_once("libs/dao.php");

    function obtenerUnidades(){
        $unidades = array();
        $sqlstr = "select * from unidades;";
        $unidades = obtenerRegistros($sqlstr);
        return $unidades;
    }

    function obtenerUnidadesConPadre(){
        $unidades = array();
        $sqlstr = "select a.undid, a.unddes, a.undprnt, ifnull(b.unddes, 'Sin Padre') as undprntdes, a.undfprnt, a.undest, a.undtip from unidades a left join unidades b on a.undprnt = b.undid;";
        $unidades = obtenerRegistros($sqlstr);
        return $unidades;
    }

    function obtenerUnidad($unidadID){
      $unidad = array();
      $sqlstr = "select * from unidades where undid = %d;";
      $sqlstr = sprintf($sqlstr, $unidadID);
      $unidad = obtenerUnRegistro($sqlstr);
      return $unidad;
    }

    function obtenerUnidadesPadreSelect($unidadID = 0, $selecteID = 0){
      $unidades = array();
      $sqlstr = "select undid, unddes from unidades where undid <> %d;";
      $sqlstr = sprintf($sqlstr, $unidadID);
      $unidades = obtenerRegistros($sqlstr);
      $unidades[] = array("undid"=>0, "unddes"=>"No tiene Padre");
      for($i=0; $i<count($unidades); $i++){
        $unidades[$i]["selected"] = ($unidades[$i]["undid"] == $selecteID)?"selected":"";
      }
      return $unidades;
    }

    function obtenerUnidadesTipoSelected($unidadTipo = 'LIQ'){
      $tipos = array(
        array("undTipId" => "LIQ" , "undTipDes" => "Liquido", "selected"=>""),
        array("undTipId" => "PES" , "undTipDes" => "Peso", "selected"=>""),
        array("undTipId" => "VOL" , "undTipDes" => "Volumen", "selected"=>""),
        array("undTipId" => "VEL" , "undTipDes" => "Velocidad", "selected"=>""),
        array("undTipId" => "FRZ" , "undTipDes" => "Fuerza", "selected"=>""),
        array("undTipId" => "TMP" , "undTipDes" => "Temperatura", "selected"=>"")
      );

      for($i=0; $i<count($tipos); $i++){
        $tipos[$i]["selected"] = ($tipos[$i]["undTipId"] == $unidadTipo)?"selected":"";
      }
      return $tipos;
    }
    function insertarUnidad($unidad){
      if($unidad && is_array($unidad)){
         $sqlInsert = "INSERT INTO `unidades` (`unddes`, `undprnt`, `undfprnt`, `undest`, `undtip`)VALUES('%s','%d','%f','%s','%s');";
         $sqlInsert = sprintf($sqlInsert,
                        valstr($unidad["unddes"]),
                        valstr($unidad["undprnt"]),
                        valstr($unidad["undfprnt"]),
                        valstr($unidad["undest"]),
                        valstr($unidad["undtip"])
                      );
         if(ejecutarNonQuery($sqlInsert)){
           return getLastInserId();
         }
      }
      return false;
    }

    function actualizarUnidad($unidad){
      if($unidad && is_array($unidad)){
        $sqlUpdate = "update unidades set unddes='%s', undprnt=%d, undfprnt=%f, undest='%s', undtip='%s' where undid=%d;";
        $sqlUpdate = sprintf($sqlUpdate,
                      valstr($unidad["unddes"]),
                      valstr($unidad["undprnt"]),
                      valstr($unidad["undfprnt"]),
                      valstr($unidad["undest"]),
                      valstr($unidad["undtip"]),
                      valstr($unidad["undid"])
                    );
        return ejecutarNonQuery($sqlUpdate);
      }
      return false;
    }

    function borrarUnidad($unidadID){
      if($unidadID){
        $sqlDelete = "delete from unidades where undid=%d;";
        $sqlDelete = sprintf($sqlDelete,
                      valstr($unidadID)
                    );
        return ejecutarNonQuery($sqlDelete);
      }
      return false;
    }
?>
