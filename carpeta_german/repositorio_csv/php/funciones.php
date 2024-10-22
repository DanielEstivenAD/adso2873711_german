<?php

function escapeHtml($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

function readCategories($filename) {
    $categories = [];
    if (($handle = fopen($filename, 'r')) !== FALSE) {
        while (($data = fgetcsv($handle)) !== FALSE) {
            $categories[] = $data;
        }
        fclose($handle);
    }
    return $categories;
}

function readExamples($filename) {
    $examples = [];
    if (($handle = fopen($filename, 'r')) !== FALSE) {
        while (($data = fgetcsv($handle)) !== FALSE) {
            $examples[] = $data; // Agregar cada fila del CSV al array
        }
        fclose($handle);
    }
    return $examples;
}
function writeCategories($filename, $categories) {
    $file = fopen($filename, 'w'); // Abre el archivo en modo escritura
    if ($file) {
        foreach ($categories as $category) {
            fputcsv($file, $category); // Escribe cada categoría como una línea en el CSV
        }
        fclose($file); // Cierra el archivo
    } else {
        throw new Exception("No se pudo abrir el archivo para escribir."); // Manejo de errores si el archivo no se puede abrir
    }
}

function getCategoryDetails($id, $filename) {
    $categories = readCategories($filename);
    foreach ($categories as $category) {
        if ($category[0] == $id) {
            return [
                'title' => escapeHtml($category[1]),
                'description' => escapeHtml($category[2])
            ];
        }
    }
    return null; // Si no se encuentra la categoría
}
?>
