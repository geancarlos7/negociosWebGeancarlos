<?php
  /*
  INSERT INTO `roles`
(`idroles`,
`roledes`,
`roleest`)
  */

  require_once("libs/dao.php");

  function obtenerRoles(){
    $roles= array();
    $sqlstr = "Select * from roles;";
    $roles = obtenerRegistros($sqlstr);
    return $roles;
  }
  
  function obtenerRolesActivos(){
    $roles= array();
    $sqlstr = "Select * from roles where roleest='ACT';";
    $roles = obtenerRegistros($sqlstr);
    return $roles;
  }

  function obtenerRol($roleID){
    $rol= array();
    $sqlstr = "Select * from roles where idroles='%s';";
    $sqlstr = sprintf($sqlstr, valstr($roleID));
    $rol = obtenerUnRegistros($sqlstr);
    return $rol;
  }

  function agregarRol($rol){
    $insertSQL = "INSERT INTO `roles` (`idroles`,`roledes`,`roleest`) values ('%s','%s','%s');";
    $insertSQL = sprintf($insertSQL,
                         valstr($rol["idroles"]),
                         valstr($rol["roledes"]),
                         valstr($rol["roleest"]));
    return ejecutarNonQuery($insertSQL) && true;
  }

  function actualizarRol($rol){
    $updateSQL = "update `roles` set roledes='%s' , roleest='%s' where idroles = '%s';";
    $updateSQL = sprintf($updateSQL,
                         valstr($rol["roledes"]),
                         valstr($rol["roleest"]),
                         valstr($rol["idroles"]));
    return ejecutarNonQuery($updateSQL) && true;
  }

  function borrarRol($rolId){
    $deleteSQL = "delete from roles where idroles = '%s';";
    $deleteSQL = sprintf($deleteSQL,
                         valstr($rolId));
    return ejecutarNonQuery($deleteSQL) && true;
  }

  function obtenerRolesForCombo($selectedRolId){
    $roles = obtenerRolesActivos();
    for($i=0;$i<count($roles); $i++){
      if($roles[$i]["idroles"]==$selectedRolId){
        $roles[$i]["selected"] = "selected";
      } else {
        $roles[$i]["selected"] = "";
      }
    }
    return $roles;
  }

 ?>
