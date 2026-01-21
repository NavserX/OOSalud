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
<h1>Gestión de Pacientes - OOSalud</h1>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>SIP</th>
        <th>Fecha Nacimiento</th>
        <th>Alergias</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($pacientes as $p): ?>
        <tr>
            <td><?= $p->getId() ?></td>
            <td><?= $p->getNombre() ?></td>
            <td><?= $p->getSip() ?></td>
            <td><?= $p->getFechaNacimiento() ?></td>
            <td><?= $p->getAlergias() ?? 'Ninguna' ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>