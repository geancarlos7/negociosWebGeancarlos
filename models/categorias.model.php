<?php
    //modelo de datos de productos
    require_once("libs/dao.php");

    function obtenerCategorias(){
        $categorias = array();
        $sqlstr = "select * from categorias;";
        $categorias = obtenerRegistros($sqlstr);
        return $categorias;
    }
    function obtenerCategoria($categoriaID){
      $categoria = array();
      $sqlstr = "select * from categorias where ctgid = %d;";
      $sqlstr = sprintf($sqlstr, $categoriaID);
      $categoria = obtenerUnRegistro($sqlstr);
      return $categoria;
    }
    function insertarCategoria($categoria){
      if($categoria && is_array($categoria)){
         $sqlInsert = "INSERT INTO categorias(`ctgdsc`,`ctgest`)VALUES('%s','%s');";
         $sqlInsert = sprintf($sqlInsert,
                        valstr($categoria["ctgdsc"]),
                        valstr($categoria["ctgest"])
                      );
         if(ejecutarNonQuery($sqlInsert)){
           return getLastInserId();
         }
      }
      return false;
    }

    function actualizarCategoria($categoria){
      if($categoria && is_array($categoria)){
        $sqlUpdate = "update categorias set ctgdsc='%s', ctgest='%s' where ctgid=%d;";
        $sqlUpdate = sprintf($sqlUpdate,
                      valstr($categoria["ctgdsc"]),
                      valstr($categoria["ctgest"]),
                      valstr($categoria["ctgid"])
                    );
        return ejecutarNonQuery($sqlUpdate);
      }
      return false;
    }

    function borrarCategoria($categoriaID){
      if($categoriaID){
        $sqlDelete = "delete from categorias where ctgid=%d;";
        $sqlDelete = sprintf($sqlDelete,
                      valstr($categoriaID)
                    );
        return ejecutarNonQuery($sqlDelete);
      }
      return false;
    }
?>
