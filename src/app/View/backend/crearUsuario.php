<?php
$title="Administración de Netflix";

include_once DIRECTORIO_TEMPLATE_BACKEND."head.php";
include_once DIRECTORIO_TEMPLATE_BACKEND."header.php";
include_once DIRECTORIO_TEMPLATE_BACKEND."aside.php";
$tituloSeccion="Crear un nuevo usuario";
include_once DIRECTORIO_TEMPLATE_BACKEND."main.php";
?>

    <form method="post" action="/user">
        <div class="mb-3">
            <label for="inputEmail" class="form-label">Correo</label>
            <input type="email" class="form-control" id="inputEmail" name="email"
            <?php if(isset($resultado)){ echo "value='".$_POST['email']."'";} ?>
            >
        </div>
        <div class="mb-3">
            <label for="inputUsername" class="form-label">Nombre de Usuario</label>
            <input type="text" class="form-control" id="inputUsername" name="username">
        </div>
        <div class="mb-3">
            <label for="inputPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="inputPassword" name="password">
        </div>
        <div class="mb-3">
            <label for="inputBirthdate" class="form-label">Fecha de nacimiento</label>
            <input type="date" class="form-control" id="inputBirthdate" name="birthdate">
        </div>
        <div class="mb-3">
            <select class="form-select" name="type">
                <option selected>Tipo de usuario</option>
                <option value="admin">Admin</option>
                <option value="normal">Normal</option>
                <option value="publicidad">Publicidad</option>
            </select>
        </div>

        <?php if(isset($resultado)){?>
        <div class="p-3 text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-3">
            <?php foreach ($resultado as $error) { echo $error; } ?>
        </div>

        <?php } ?>
        <button type="submit" class="btn btn-primary">Crear Usuario</button>
    </form>




<?php
include_once DIRECTORIO_TEMPLATE_BACKEND."footer.php";
