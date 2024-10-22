<!DOCTYPE html>
<html>
<head>
    <title>CRUD en PHP con archivo CSV - Editar registro</title>
</head>
<body>
    <h1>CRUD en PHP con archivo CSV - Editar registro</h1>

    <?php
    // Verificar si se ha enviado un índice de registro
    if (isset($_GET['index'])) {
        // Obtener el índice de registro
        $index = $_GET['index'];

        // Abrir el archivo CSV en modo lectura
        $file = fopen('data.csv', 'r');

        // Leer los datos del archivo CSV y almacenarlos en un arreglo
        $data = array();
        while (($line = fgetcsv($file)) !== FALSE) {
            $data[] = $line;
        }

        // Cerrar el archivo CSV
        fclose($file);

        // Verificar si el índice de registro es válido
        if (isset($data[$index])) {
            // Obtener los datos del registro a editar
            $registro = $data[$index];
            $nombre = $registro[0];
            $apellido = $registro[1];
            $edad = $registro[2];
            $email = $registro[3];
            $telefono = $registro[4];

            // Mostrar el formulario para editar los datos del registro
            echo '<form method="POST" action=update.php>';
            echo '<input type="hidden" name="index" value="' . $index . '">';
            echo 'Nombre: <input type="text" name="nombre" value="' . $nombre . '"><br>';
            echo 'Apellido: <input type="text" name="apellido" value="' . $apellido . '"><br>';
            echo 'Edad: <input type="number" name="edad" value="' . $edad . '""><br>';
            echo 'Correo electrónico: <input type="email" name="email" value="' . $email . '"><br>';
            echo 'Teléfono: <input type="tel" name="telefono" value="' . $telefono . '"><br>';
            echo '<input type="submit" value="Guardar">';
            echo '</form>';
        } else {
            echo '<p>El índice de registro no es válido.</p>';
        }
    } else {
        echo '<p>No se ha especificado un índice de registro para editar.</p>';
    }
    ?>
</body>
</html>