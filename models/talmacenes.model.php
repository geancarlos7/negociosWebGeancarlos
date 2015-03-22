<?php
    //modelo de datos de empresa
    /*
    idtiposAlmacen
    descripcion

    */

    require_once("libs/dao.php");

    function obtenerTalmacenes(){
        $talmacenes = array();
        $sqlstr = "select * from tiposalmacen;";
        $talmacenes = obtenerRegistros($sqlstr);
        return $talmacenes;
    }


    function obtenerTalmacen($idtiposAlmacen){
      $talmacen = array();
      $sqlstr = "select * from tiposalmacen where idtiposAlmacen = %d;";
      $sqlstr = sprintf($sqlstr, $idtiposAlmacen);
      $talmacen = obtenerUnRegistro($sqlstr);
      return $talmacen;
    }

    
    function insertarTalmacen($talmacen){
      if($talmacen && is_array($talmacen)){
         //if(!isset($talmacen["empusring"]))$talmacen["empusring"]="Sistemas";
         $sqlInsert = "INSERT INTO `tiposalmacen` (`descripcion`) VALUES ('%s');";
         $sqlInsert = sprintf($sqlInsert,
                        $talmacen["descripcion"]
                              );
         if(ejecutarNonQuery($sqlInsert)){
           return getLastInserId();
         }
      }
      return false;
    }

    function actualizarTalmacen($talmacen){
      if($talmacen && is_array($talmacen)){
        $sqlUpdate = "update tiposalmacen set descripcion='%s' where idtiposAlmacen=%d;";
        $sqlUpdate = sprintf($sqlUpdate,
                              valstr($talmacen["descripcion"]),                            
                              valstr($talmacen["idtiposAlmacen"])
                    );
        return ejecutarNonQuery($sqlUpdate);
      }
      return false;
    }
   

    function borrarTalmacen($idtiposAlmacen){
      if($idtiposAlmacen){
        $sqlDelete = "delete from tiposalmacen where idtiposAlmacen=%d;";
        $sqlDelete = sprintf($sqlDelete,
                      valstr($idtiposAlmacen)
                    );
        return ejecutarNonQuery($sqlDelete);
      }
      return false;
    }

?>
