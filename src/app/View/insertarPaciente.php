<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Pacientes</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
<h1>Añadir Pacientes - OOSalud</h1>
<form action="/paciente" method="post">
    <label for="inputSIP">Introduce el SIP</label>
    <input type="text" id="inputSIP" name="numero_sip">

    <label for="inputNombre">Introduce el nombre</label>
    <input type="text" id="inputNombre" name="nombre">

    <textarea id="inputAlergia" name="alergias"></textarea>

    <label for="inputFecha">Introduce el Fecha</label>
    <input type="date" id="inputFecha" name="fecha_nacimiento">

    <input type="submit" value="Enviar">


</form>


</body>
</html>