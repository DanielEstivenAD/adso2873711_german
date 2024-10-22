<?php
// Verificar si se ha enviado un índice de registro
if (isset($_POST['index'])) {
    // Obtener el índice de registro
    $index = $_POST['index'];

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
        // Eliminar el registro del arreglo
        unset($data[$index]);

        // Abrir el archivo CSV en modo escritura
        $file = fopen('data.csv', 'w');

        // Escribir los datos actualizados en el archivo CSV
        foreach ($data as $line) {
            fputcsv($file, $line);
        }

        // Cerrar el archivo CSV
        fclose($file);

        // Redirigir al usuario a la página principal
        header('Location: index.php');
        exit();
    } else {
        echo '<p>El índice de registro no es válido.</p>';
    }
} else {
    echo '<p>No se ha especificado un índice de registro para eliminar.</p>';
}
?>