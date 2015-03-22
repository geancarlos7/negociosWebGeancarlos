<?php
      
    require_once("libs/dao.php");

    function obtenerAlmacenes(){
        $Almacenes = array();
        $sqlstr = "select * from almacen;";
        $Almacenes = obtenerRegistros($sqlstr);
        return $Almacenes;
    }
    
     function obtenerTipos(){
        $tAlmacenes = array();
        $sqlstr = "select * from tiposalmacen;";
        $tAlmacenes = obtenerRegistros($sqlstr);
        return $tAlmacenes;
    }
    
    function obtenerAlmacen($idalmacenes){
       $Almacen = array();
      $sqlstr = "select * from almacen where idalmacenes = %d;";
      $sqlstr = sprintf($sqlstr, $idalmacenes);
       $Almacen = obtenerUnRegistro($sqlstr);
      return  $Almacen;
    }
    
    function insertarAlmacen($Almacen){
      if($Almacen && is_array($Almacen)){
         
         $sqlInsert = "INSERT INTO `almacen` (`rtn`, `descripcion`, `tipomaterial`, `subalmacen`, `direccion`, `telefono`, `idsuperalmacen`, `idempresa`) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s');";
         $sqlInsert = sprintf($sqlInsert,
                        $Almacen["rtn"],
                        $Almacen["descripcion"],
                        $Almacen["tipomaterial"],
                        $Almacen["subalmacen"],
                        $Almacen["direccion"],
                        $Almacen["telefono"],
                        $Almacen["idsuperalmacen"],
                        $Almacen["idempresa"]
                     
                      );
         if(ejecutarNonQuery($sqlInsert)){
           return getLastInserId();
         }
      }
      return false;
    }
    
    function actualizarAlmacen($Almacen){
      if($Almacen && is_array($Almacen)){
        $sqlUpdate = "update almacenes set rtn='%s', descripcion='%s', tipomaterial='%s', subalmacen='%s', direccion='%s' , telefono='%s', idsuperalmacen='%s', idempresa='%s' where idalmacenes=%d;";
        $sqlUpdate = sprintf($sqlUpdate,
                              valstr($Almacen["rtn"]),
                              valstr($Almacen["descripcion"]),
                              valstr($Almacen["tipomaterial"]),
                              valstr($Almacen["subalmacen"]),
                              valstr($Almacen["direccion"]),
                              valstr($Almacen["telefono"]),
                              valstr($Almacen["idsuperalmacen"]),
                              valstr($Almacen["idempresa"]),
                              valstr($Almacen["idalmacenes"])
                                                  );
        return ejecutarNonQuery($sqlUpdate);
      }
      return false;
    }
   

    function borrarAlmacen($idalmacenes){
      if($idalmacenes){
        $sqlDelete = "delete from almacenes where idalmacenes=%d;";
        $sqlDelete = sprintf($sqlDelete,
                      valstr($idalmacenes)
                    );
        return ejecutarNonQuery($sqlDelete);
      }
      return false;
    }

?>
