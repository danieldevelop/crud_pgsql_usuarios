<?php

require_once './includes/database.php';

function existeRegistro() {
    global $conexionDatabase;
    
    $sql = "SELECT * FROM usuario";
    $result = pg_query($conexionDatabase, $sql);
    $fila = pg_num_rows($result);
    
    return ($fila > 0) ? true : false;
}


function listarUsuario() {
    global $conexionDatabase;
    $campos = array();
    
    $sql = "SELECT u.id, u.rut, CONCAT_WS(' ', u.nombre, u.apllidos) AS nombre, u.nacionalidad, u.sexo, ";
    $sql.= "u.fchnacimiento, u.username ";
    $sql.= "FROM usuario u ";
    $sql.= "ORDER BY u.id DESC ;";
    $result = pg_query($conexionDatabase, $sql);
    
//     por defecto viene PGSQL_BOTH en el fetch_array, si no se le associa un PGSQL_NUM o PGSQL_ASSOC
    while($fila = pg_fetch_array($result)) {
        $campos[] = $fila;
    }
    
    return $campos;
}