<?php
include '../php/funciones.php'; // Incluir archivo de funciones

// Leer la categoría a editar
$id = $_GET['id'];
$categories = readCategories('../bd/categoria.csv');
$category_to_edit = null;

foreach ($categories as $category) {
    if ($category[0] === $id) {
        $category_to_edit = $category;
        break;
    }
}

// Procesar el formulario de edición
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_id = $_POST['id'];
    $new_category = $_POST['category'];
    $new_title = $_POST['title'];
    $new_description = $_POST['description'];

    // Actualizar la categoría en el archivo CSV
    $updated_categories = [];
    foreach ($categories as $category) {
        if ($category[0] === $id) {
            $updated_categories[] = [$new_id, $new_category, $new_title, $new_description];
        } else {
            $updated_categories[] = $category;
        }
    }

    $file = fopen('../bd/categoria.csv', 'w');
    foreach ($updated_categories as $updated_category) {
        fputcsv($file, $updated_category);
    }
    fclose($file);

    header('Location: ../categorias.php');
    exit();
}
?>