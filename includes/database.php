<?php

include 'config.php';

$urlConexion = "host=" . DB_HOST . " port=5432 dbname=" . DB_BBDD . " ";
$urlConexion .= "user=" . DB_USER . " password=" . DB_PASS;

$conexionDatabase = pg_connect($urlConexion);