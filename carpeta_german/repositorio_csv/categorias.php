<?php
include 'php/funciones.php'; // Incluir archivo de funciones
$categories = readCategories('bd/categoria.csv'); // Leer categorías del archivo CSV
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include('config/head.php'); ?>
</head>

<body class="bg-gray-100 p-8">
    <header class="bg-gray-700 text-white p-6 rounded-lg shadow-lg mb-8 text-center">
        <h1 class="text-4xl font-bold">Categorías</h1>
        <p class="mt-4 text-lg"></p>
    </header>

    <div class="flex">
        <div class="bg-gray-500 text-white p-4 rounded-lg w-1/4 mr-4">
            <?php include('config/sidebar.php'); ?>
        </div>
        <div class="max-w-6xl mx-auto">
            <table class="min-w-full bg-white border">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border">ID</th>
                        <th class="py-2 px-4 border">Categoría</th>
                        <th class="py-2 px-4 border">Título</th>
                        <th class="py-2 px-4 border">Descripción</th>
                        <th class="py-2 px-4 border">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $category): ?>
                        <tr>
                            <td class="py-2 px-4 border"><?php echo escapeHtml($category[0]); ?></td>
                            <td class="py-2 px-4 border"><?php echo escapeHtml($category[1]); ?></td>
                            <td class="py-2 px-4 border"><?php echo escapeHtml($category[2]); ?></td>
                            <td class="py-2 px-4 border"><?php echo escapeHtml($category[3]); ?></td>
                            <td class="py-2 px-4 border">
                                <a href="f_categorias_actualizar.php?id=<?php echo escapeHtml($category[0]); ?>"
                                    class="text-blue-500">Editar</a>
                                <!-- Botón para abrir el modal -->
                                <a href="#" class="abrirModal text-red-500 hover:underline ml-2"
                                    data-id="<?php echo escapeHtml($category[0]); ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full relative">
            <!-- Cerrar modal -->
            <button id="cerrarModal" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Icono de advertencia -->
            <div class="flex items-center">
                <div class="bg-red-100 p-2 rounded-full">
                    <svg class="w-8 h-8 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18.364 5.636a9 9 0 11-12.728 12.728 9 9 0 0112.728-12.728z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01" />
                    </svg>
                </div>
                <h2 class="text-lg font-medium ml-4">Eliminar Categoría</h2>
            </div>

            <!-- Mensaje del modal -->
            <p class="text-gray-600 mt-4">Al hacer clic en el botón "Eliminar", estás confirmando que deseas borrar esta categoría de forma permanente. Esta acción no se puede deshacer y toda la información relacionada será eliminada de forma irreversible. Por favor, asegúrate de que realmente quieres proceder antes de continuar.</p>

            <!-- Botones -->
            <div class="flex justify-end mt-6 space-x-3">
                <button id="cerrarModal" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300">Cancelar</button>
                <a href="#" id="eliminarConfirmado" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">Eliminar</a>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.abrirModal').forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                const categoryId = this.dataset.id; // Obtiene el ID de la categoría
                const eliminarLink = document.getElementById('eliminarConfirmado');
                eliminarLink.setAttribute('href', `categorias/op_categorias_eliminar.php?id=${categoryId}`);
                document.getElementById('modal').classList.remove('hidden');
            });
        });

        document.querySelectorAll('#cerrarModal').forEach(button => {
            button.addEventListener('click', function () {
                document.getElementById('modal').classList.add('hidden');
            });
        });
    </script>

    <?php include('config/footer.php'); ?>
</body>

</html>
