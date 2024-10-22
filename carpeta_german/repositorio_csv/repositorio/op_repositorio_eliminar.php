<?php
include '../php/funciones.php'; // Incluir archivo de funciones

// Validar si el método GET y el parámetro 'id' están presentes y no son vacíos
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id']; // Obtener el ID del ejemplo a eliminar

    // Leer ejemplos actuales
    $examples = readExamples('../bd/ejemplos.csv');

    // Variable para saber si encontramos el ID
    $id_found = false;

    // Filtrar el ejemplo que se va a eliminar
    $updated_examples = array_filter($examples, function($example) use ($id, &$id_found) {
        if ($example[0] === $id) {
            $id_found = true; // ID encontrado, se eliminará
            return false; // No incluir este ejemplo en los actualizados
        }
        return true; // Incluir el ejemplo
    });

    // Verificar si el ejemplo con el ID fue encontrado
    if ($id_found) {
        // Guardar los ejemplos actualizados en el archivo CSV
        $file = fopen('../bd/ejemplos.csv', 'w');
        foreach ($updated_examples as $example) {
            fputcsv($file, $example);
        }
        fclose($file);

        // Redirigir a la lista de ejemplos
        header('Location: ../repositorio.php');
        exit();
    } else {
        // Si no existe el ejemplo con ese ID
        echo "El ejemplo con el ID especificado no existe.";
        exit();
    }
} else {
    // Si no se proporcionó el ID
    echo "No se ha proporcionado un ID válido.";
    exit();
}
?>
