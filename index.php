<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Aliens Ben 10</title>
    <style>
        /* Estilos básicos del sitio */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Estilos del formulario */
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            width: 100%;
        }

        button {
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        /* Estilos de la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #28a745;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Estilos de botones de acción */
        .btn-edit, .btn-delete {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-edit {
            background-color: #000000;
            color: white;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }

        /* Estilos del modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 30%;
            border-radius: 8px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover, .close:focus {
            color: black;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <h1>CRUD de Aliens Ben 10</h1>

    <div class="container">
        <!-- Formulario de Registro -->
        <form method="POST" action="crud_aliens.php">
            <input type="text" name="nombre" placeholder="Nombre del Alien" required>
            <input type="text" name="poderes" placeholder="Poderes del Alien">
            <button type="submit" name="insertar">Registrar</button>
        </form>

        <!-- Tabla de Aliens -->
        <h3>Lista de Aliens</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Poderes</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'crud_aliens.php';
                while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["nombre"]; ?></td>
                        <td><?php echo $row["poderes"]; ?></td>
                        <td>
                            <button class="btn-edit" onclick="editarAlien(<?php echo $row['id']; ?>, '<?php echo $row['nombre']; ?>', '<?php echo $row['poderes']; ?>')">Editar</button>
                            <form method="POST" action="crud_aliens.php" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="borrar" class="btn-delete">Borrar</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Modal para editar alien -->
    <div id="editarModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Editar Alien</h2>
            <form method="POST" action="crud_aliens.php">
                <input type="hidden" name="id" id="modal-id">
                <input type="text" name="nombre" id="modal-nombre" placeholder="Nombre del Alien" required>
                <input type="text" name="poderes" id="modal-poderes" placeholder="Poderes del Alien">
                <button type="submit" name="actualizar">Actualizar</button>
            </form>
        </div>
    </div>

    <script>
        // Obtener el modal
        var modal = document.getElementById("editarModal");

        // Obtener el elemento <span> que cierra el modal
        var span = document.getElementsByClassName("close")[0];

        // Mostrar el modal con los datos del alien a editar
        function editarAlien(id, nombre, poderes) {
            modal.style.display = "block";
            document.getElementById("modal-id").value = id;
            document.getElementById("modal-nombre").value = nombre;
            document.getElementById("modal-poderes").value = poderes;
        }

        // Cerrar el modal al hacer clic en el botón de cerrar
        span.onclick = function() {
            modal.style.display = "none";
        }

        // Cerrar el modal al hacer clic fuera de él
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>
</html>
