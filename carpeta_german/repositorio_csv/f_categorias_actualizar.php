<?php
include 'php/funciones.php'; // Incluir archivo de funciones

// Leer la categoría a editar
$id = $_GET['id'];
$categories = readCategories('bd/categoria.csv');
$category_to_edit = null;

foreach ($categories as $category) {
    if ($category[0] === $id) {
        $category_to_edit = $category;
        break;
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include('config/head.php'); ?>
</head>

<body class="bg-gray-100 p-8">
    <header class="bg-gray-700 text-white p-6 rounded-lg shadow-lg mb-8 text-center">
        <h1 class="text-4xl font-bold">Editar o actualizar categoría</h1>
        <p class="mt-4 text-lg"></p>
    </header>

    <div class="flex">
        <div class="bg-gray-500 text-white p-4 rounded-lg w-1/4 mr-4">
            <?php include('config/sidebar.php'); ?>
        </div>
        <div class="container mx-auto mt-12">
            <form action="categorias/op_categorias_actualizar.php?id=<?php echo $id; ?>" method="POST" class="bg-white p-6 rounded shadow">
                <input type="hidden" id="id" name="id" value="<?php echo escapeHtml($category_to_edit[0]); ?>" required>
                
                <label for="category" class="block text-gray-700 font-bold mb-2">Categoría:</label>
                <input type="text" id="category" name="category" class="w-full border p-2 mb-4" value="<?php echo escapeHtml($category_to_edit[1]); ?>" required>

                <label for="title" class="block text-gray-700 font-bold mb-2">Título:</label>
                <input type="text" id="title" name="title" class="w-full border p-2 mb-4" value="<?php echo escapeHtml($category_to_edit[2]); ?>" required>

                <label for="description" class="block text-gray-700 font-bold mb-2">Descripción:</label>
                <textarea id="description" name="description" class="w-full border p-2 mb-4" rows="3" required><?php echo escapeHtml($category_to_edit[3]); ?></textarea>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Actualizar</button>
            </form>
        </div>
    </div>
    <?php include('config/footer.php'); ?>
</body>

</html>
