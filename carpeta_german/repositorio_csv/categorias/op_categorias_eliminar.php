<?php
include '../php/funciones.php'; // Incluir archivo de funciones

// Validar si el método GET y el parámetro 'id' están presentes y no son vacíos
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id']; // Obtener el ID de la categoría a eliminar

    // Leer categorías actuales
    $categories = readCategories('../bd/categoria.csv');

    // Variable para saber si encontramos el ID
    $id_found = false;

    // Filtrar la categoría que se va a eliminar
    $updated_categories = array_filter($categories, function($category) use ($id, &$id_found) {
        if ($category[0] === $id) {
            $id_found = true; // ID encontrado, se eliminará
            return false; // No incluir esta categoría en los actualizados
        }
        return true; // Incluir la categoría
    });

    // Verificar si la categoría con el ID fue encontrada
    if ($id_found) {
        // Guardar las categorías actualizadas en el archivo CSV
        $file = fopen('../bd/categoria.csv', 'w');
        foreach ($updated_categories as $category) {
            fputcsv($file, $category);
        }
        fclose($file);

        // Redirigir a la lista de categorías
        header('Location: ../categorias.php');
        exit();
    } else {
        // Si no existe la categoría con ese ID
        echo "La categoría con el ID especificado no existe.";
        exit();
    }
} else {
    // Si no se proporcionó el ID
    echo "No se ha proporcionado un ID válido.";
    exit();
}
?>
