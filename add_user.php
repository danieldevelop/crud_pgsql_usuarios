<?php

require_once './includes/database.php';

if (isset($_POST['btn-guardar']))
{
    $rut = $_POST['inpRut'];
    $apellido = $_POST['inpApellido'];
    $nombre = $_POST['inpNombre'];
    $nacionalidad = $_POST['inpNacionalidad'];
    $fchNacimiento = $_POST['inpFchNacimiento'];
    $sexo = (isset($_POST['inpSexo'])) ? $_POST['inpSexo'] : null;
    $username = $_POST['inpUsername'];
    $password= $_POST['inpPassword'];
    
    if ($rut == "" && $apellido == "" && $nombre == "" && $nacionalidad == "-1" && $fchNacimiento == "" && 
        $sexo == "" && $username == "" && $password == "") {
        echo '<script>
            window.alert("Los campos no pueden estar vacio");
            window.location.href="./add_user.php";
        </script>';     

        return false;
    }
    
    $sql ="INSERT INTO usuario(rut, apllidos, nombre, nacionalidad, sexo, fchnacimiento, username, userpass) ";
    $sql.="VALUES('{$rut}', '{$apellido}', '{$nombre}', '{$nacionalidad}', '{$sexo}', '{$fchNacimiento}', ";
    $sql.="'{$username}', '{$password}'); ";
    $result = pg_query($conexionDatabase, $sql);
    
    if ($result) {
        echo '<script>
            window.alert("Usuario regsitrado con exito");
            window.location.href="./";
        </script>';
    } else {
        echo '<script>
            window.alert("Error al registrar usuario");
            window.location.href = "./add_user.php";
        </script>';
    }
    
}

?>


<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<title>CRUD PHP | PostgreSQL</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
	<link rel="shortcut icon" type="image/x-icon" href="./img/favicon.ico" />

<!--     CSS only and local -->
	<link rel="stylesheet" href="./css/bootstrap.css" media="all" />
</head>
<body>
	
	<header class="text-center">
		<div class="container">
			<h1 class="fw-normal mt-4 h2">Registrar Usuario</h1>
			<small class="text-muted">Database of example <span class="fw-bold">crudpgsql</span></small>
		</div>
	</header>
	
	<main class="my-4">
		<div class="container">
			<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="row g-3">
				<div class="col-md-2 my-3">
					<label for="inpRut" class="form-label fw-semibold">Rut:</label>
					<input type="text" name="inpRut" id="inpRut" class="form-control form-control-sm" placeholder="Ej. 11111111-1">
				</div>
				<div class="col-md-5">
					<label for="inpApellidos" class="form-label fw-semibold">Apellidos:</label>
					<input type="text" name="inpApellido" id="inpApellidos" class="form-control form-control-sm">
				</div>
				<div class="col-md-5">
					<label for="inpNombre" class="form-label fw-semibold">Nombre:</label>
					<input type="text" name="inpNombre" id="inpNombre" class="form-control form-control-sm">
				</div>
				
				
				<div class="col-md-3 my-3">
					<label for="inpNacionalidad" class="form-label fw-semibold">Nacionalidad:</label>
					<select name="inpNacionalidad" id="inpNacionalidad" class="form-select form-select-sm">
						<option value="-1" selected>Seleccione...</option>
						<option value="chilena">Chilena</option>
						<option value="extranjera">Extranjera</option>
					</select>
				</div>
				<div class="col-md-3">
					<label for="inpFchNacimiento" class="form-label fw-semibold">Fecha de nacimiento:</label>
					<input type="date" name="inpFchNacimiento" id="inpFchNacimiento" class="form-control form-control-sm">
				</div>
				<div class="col-md-6">
					<label class="form-label fw-semibold">Sexo:</label>
					<section>
						<div class="form-check form-check-inline">
							<input type="radio" name="inpSexo" id="masculino" class="form-check-input" value="M">
							<label for="masculino" class="form-check-label">Masculino</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="inpSexo" id="femenina" class="form-check-input" value="F">
							<label for="femenina" class="form-check-label">Femenina</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="inpSexo" id="indeterminado" class="form-check-input" value="IND">
							<label for="indeterminado" class="form-check-label">Indeterminado</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="inpSexo" id="pnd" class="form-check-input" value="PND">
							<label for="pnd" class="form-check-label">Prefiero no decirlo</label>
						</div>
					</section>
				</div>
				
				
				<div class="col-md-6 my-3">
					<label for="inpUsername" class="form-label fw-semibold">Nombre de Usuario:</label>
					<input type="text" name="inpUsername" id="inpUsername" class="form-control form-control-sm" autocomplete="off">
				</div>
				<div class="col-md-6">
					<label for="inpPassword" class="form-label fw-semibold">Contraseña:</label>
					<input type="password" name="inpPassword" id="inpPassword" class="form-control form-control-sm" autocomplete="off">
				</div>
				
				
				<div class="col-12 d-flex gap-3">
					<button type="submit" class="btn btn-primary btn-sm text-uppercase" name="btn-guardar">guardar</button>
					<a href="./" class="btn btn-outline-dark btn-sm text-uppercase">ver usuarios</a>
				</div>
			</form>
		</div>
	</main>
	
</body>
</html>