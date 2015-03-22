<?php
    //modelo de datos de empresa
    /*
   idmateriales
   descripcion
   estado
    */

    require_once("libs/dao.php");
     function obtenerMateriales(){
        $Materiales = array();
        $sqlstr = "select * from materiales;";
        $Materiales = obtenerRegistros($sqlstr);
        return $Materiales;
    }

    function obtenerMateriale($idmateriales){
      $Materiale = array();
      $sqlstr = "select * from materiales where idmateriales = %d;";
      $sqlstr = sprintf($sqlstr, $idmateriales);
      $Materiale = obtenerUnRegistro($sqlstr);
      return $Materiale;
    }

    function insertarMateriale($Materiale){
      if($Materiale && is_array($Materiale)){
         //if(!isset($Materiale["empusring"]))$Materiale["empusring"]="Sistemas";
         $sqlInsert = "INSERT INTO `materiales` (`descripcion`,`estado`) VALUES ('%s', '%s');";
         $sqlInsert = sprintf($sqlInsert,
                        $Materiale["descripcion"],
                        $Materiale["estado"]
                        );
         
         if(ejecutarNonQuery($sqlInsert)){
           return getLastInserId();
         }
      }
      return false;
    }

    function actualizarMateriale($Materiale){
      if($Materiale && is_array($Materiale)){
        $sqlUpdate = "update materiales set descripcion='%s', estado='%s' where idmateriales=%d;";
        $sqlUpdate = sprintf($sqlUpdate,
                              valstr($Materiale["descripcion"]),
                              valstr($Materiale["estado"]),
                              valstr($Materiale["idmateriales"])
                    );
        return ejecutarNonQuery($sqlUpdate);
      }
      return false;
    }


    function borrarMateriale($idmateriales){
      if($idmateriales){
        $sqlDelete = "delete from materiales where idmateriales=%d;";
        $sqlDelete = sprintf($sqlDelete,
                      valstr($idmateriales)
                    );
        return ejecutarNonQuery($sqlDelete);
      }
      return false;
    }

?>
