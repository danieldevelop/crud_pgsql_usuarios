<?php

require_once './includes/database.php';
require_once './includes/functions.php';

$a_usuario = buscarUsuario((int) $_GET['id']); // Si no lo convierte a int data error

if (isset($_POST['btn-actualizar'])) 
{
    $id = $_POST['inpId'];
    $rut = $_POST['inpRut'];
    $apellidos = $_POST['inpApellidos'];
    $nombre = $_POST['inpNombre'];
    $nacionalidad = $_POST['inpNacionalidad'];
    $fchnacimiento = $_POST['inpFchNacimiento'];
    $sexo = (isset($_POST['inpSexo'])) ? $_POST['inpSexo'] : null;
    $username = $_POST['inpUsername'];
    $password = $_POST['inpPassword'];
    
    $sql ="UPDATE usuario SET ";
    $sql.="rut = '$rut', apllidos = '$apellidos', nombre = '$nombre', nacionalidad = '$nacionalidad', sexo = '$sexo', ";
    $sql.="fchnacimiento = '$fchnacimiento', username = '$username', userpass = '$password' ";
    $sql.="WHERE id = $id; ";
    $result = pg_query($conexionDatabase, $sql);
    
    if ($result) {
        echo '<script>
            window.alert("Usuario actualizado con exito");
            window.location.href = "./";
        </script>';
    } else {
        echo '<script>
            window.alert("Error al actualizar usuario");
            window.location.href = "./edit_user.php";
        </script>';
    }
}
?>


<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<title>CRUD PHP | PostgreSQL</title>
	<link rel="shortcut icon" type="image/x-icon" href="./img/favicon.ico" />
	
<!-- 	CSS only and local -->
	<link rel="stylesheet" href="./css/bootstrap.css" media="all" />
</head>
<body>
	
	<header class="text-center">
		<div class="container">
			<h1 class="fw-normal mt-4 h2">Actualizar Usuario <br>
				<small class="fw-semibold h4 bg-danger text-white rounded" style="padding: .2rem">
					# <?php echo $a_usuario['id']; ?>
				</small> 
			</h1>
			<small class="text-muted">Database of <span class="fw-bold">crudmysql</span></small>
		</div>
	</header>
	
	<main class="my-3">
		<div class="container">
			<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" class="row g-3">
<!-- 				Se mantiene oculto para poder mandar el ID de usuario actual -->
				<input type="hidden" name="inpId" value="<?php echo $a_usuario['id']; ?>">
				
				<div class="col-md-2 my-3">
					<label for="inpRut" class="form-label fw-semibold">Rut:</label>
					<input type="text" name="inpRut" id="inpRut" class="form-control form-control-sm" value="<?php echo $a_usuario['rut']; ?>">
				</div>
				<div class="col-md-5">
					<label for="inpApellidos" class="form-label fw-semibold">Apellidos:</label>
					<input type="text" name="inpApellidos" id="inpApellidos" class="form-control form-control-sm" value="<?php echo $a_usuario['apllidos']; ?>">
				</div>
				<div class="col-md-5">
					<label for="inpNombre" class="form-label fw-semibold">Nombre:</label>
					<input type="text" name="inpNombre" id="inpNombre" class="form-control form-control-sm" value="<?php echo $a_usuario['nombre']; ?>" >
				</div>
				
				
				<div class="col-md-3 my-3">
					<label for="inpNacionalidad" class="form-label fw-semibold">Nacionalidad:</label>
					<select name="inpNacionalidad" id="inpNacionalidad" class="form-select form-select-sm">
						<option value="-1" <?php if($a_usuario['nacionalidad'] == "") { echo 'selected'; } ?>>Seleccione...</option>
						<option value="chilena" <?php if($a_usuario['nacionalidad'] == "chilena") { echo 'selected'; } ?>>Chilena</option>
						<option value="extranjera" <?php if($a_usuario['nacionalidad'] == "extranjera") { echo 'selected'; }?>>Extranjera</option>
					</select>
				</div>
				<div class="col-md-3">
					<label for="inpFchNacimiento" class="form-label fw-semibold">Fecha de Nacimiento:</label>
					<input type="date" name="inpFchNacimiento" id="inpFchNacimiento" class="form-control form-control-sm" value="<?php echo $a_usuario['fchnacimiento']; ?>">
				</div>
				<div class="col-md-6">
					<label class="form-label fw-semibold">Sexo:</label>
					<section>
						<div class="form-check form-check-inline">
							<input type="radio" name="inpSexo" id="masculino" class="form-check-input" value="M" <?php if ($a_usuario['sexo'] == "M") { echo 'checked'; } ?>>
							<label for="masculino" class="form-check-label">Masculino</label>
						</div>
						<div class="form-check form-check-inline">	
							<input type="radio" name="inpSexo" id="femenina" class="form-check-input" value="F" <?php if ($a_usuario['sexo'] == "F") { echo 'checked'; } ?>>
							<label for="femenina" class="form-check-label">Femenina</label>
						</div>
						<div class="form-check form-check-inline">	
							<input type="radio" name="inpSexo" id="indeterminado" class="form-check-input" value="IND" <?php if ($a_usuario['sexo'] == "IND") { echo 'checked'; } ?>>
							<label for="indeterminado" class="form-check-label">Indeterminado</label>
						</div>
						<div class="form-check form-check-inline">	
							<input type="radio" name="inpSexo" id="pnd" class="form-check-input" value="PND" <?php if ($a_usuario['sexo'] == "PND") { echo 'checked'; } ?>>
							<label for="pnd" class="form-check-label">Prefiero no decirlo</label>
						</div>
					</section>
				</div>
				
				
				<div class="col-md-6 my-3">
					<label for="inpUsername" class="form-label fw-semibold">Nombre de Usuario:</label>
					<input type="text" name="inpUsername" id="inpUsername" class="form-control form-control-sm" autocomplete="off" value="<?php echo $a_usuario['username']; ?>">
				</div>
				<div class="col-md-6">
					<label for="inpPassword" class="form-label fw-semibold">Contraseña:</label>
					<input type="password" name="inpPassword" id="inpPassword" class="form-control form-control-sm" autocomplete="off" value="<?php echo $a_usuario['userpass']; ?>">
				</div>
				
				
				<div class="col-12 d-flex gap-3">
					<button type="submit" class="btn btn-primary btn-sm text-uppercase" name="btn-actualizar">actualizar</button>
					<a href="./" class="btn btn-outline-dark btn-sm text-uppercase">ver usuarios</a>
				</div>
			</form>
		</div>
	</main>
	
</body>
</html>