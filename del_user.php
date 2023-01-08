<?php

require_once './includes/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM usuario WHERE id = $id";
    $result = pg_query($conexionDatabase, $sql);
    
    if ($result) {
        echo '<script>
            window.alert("El registro se elimino exitosamente");
            window.location.href="./";
        </script>';
    } else {
        echo '<script>
            window.alert("Error al eliminar el registro");
            window.location.href="./";
        </script>';
    }
}