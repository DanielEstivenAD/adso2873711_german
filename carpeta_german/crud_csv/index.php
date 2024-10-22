<!DOCTYPE html>
<html>
<head>
    <title>CRUD en PHP con archivo CSV</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Función para enviar una petición Ajax para editar un registro
            function editarRegistro(index) {
                console.log(index); // imprimir el valor de index
                $.ajax({
                    type: 'POST',
                    url: 'edit.php',
                    data: {index: index},
                    success: function() {
                        window.location = 'edit.php?index=' + index;
                    }
                });
            }

            // Función para enviar una petición Ajax para eliminar un registro
            function eliminarRegistro(index) {
                if (confirm('¿Está seguro que desea eliminar este registro?')) {
                    console.log(index); // imprimir el valor de index
                    $.ajax({
                        type: 'POST',
                        url: 'delete.php',
                        data: {index: index},
                        success: function() {
                            window.location.reload();
                        }
                    });
                }
            }

            // Agregar eventos click a los botones de editar y eliminar
            $('.editar').click(function() {
                var index = $(this).attr('data-index');
                editarRegistro(index);
            });

            $('.eliminar').click(function() {
                var index = $(this).attr('data-index');
                eliminarRegistro(index);
            });
        });
    </script>
</head>
<body>
    <h1>CRUD en PHP con archivo CSV</h1>

    <!-- Agregar un botón para crear un nuevo registro -->
    <p><a href="create.php">Agregar nuevo registro</a></p>

    <?php
    // Abrir el archivo CSV en modo lectura
    $file = fopen('data.csv', 'r');

    // Leer los datos del archivo CSV y almacenarlos en un arreglo
    $data = array();
    while (($line = fgetcsv($file)) !== FALSE) {
        $data[] = $line;
    }

    // Cerrar el archivo CSV
    fclose($file);

    // Mostrar los datos en una tabla
    echo '<table>';
    echo '<tr><th>Nombre</th><th>Apellido</th><th>Edad</th><th>Correo electrónico</th><th>Teléfono</th><th>Acciones</th></tr>';

    foreach ($data as $index => $row) {
        // Mostrar los datos en una fila de la tabla
        echo '<tr>';
        echo '<td>' . $row[0] . '</td>';
        echo '<td>' . (isset($row[1]) ? $row[1] : '') . '</td>';
        echo '<td>' . (isset($row[2]) ? $row[2] : '') . '</td>';
        echo '<td>' . (isset($row[3]) ? $row[3] : '') . '</td>';
        echo '<td>' . (isset($row[4]) ? $row[4] : '') . '</td>';

        // Agregar botones de edición y eliminación a la fila de la tabla
        echo '<td>';
        echo '<button class="editar" data-index="' . $index . '">Editar</button>';
        echo '<button class="eliminar" data-index="' . $index . '">Eliminar</button>';
        echo '</td>';

        echo '</tr>';
    }

    echo '</table>';
    ?>
</body>
</html>