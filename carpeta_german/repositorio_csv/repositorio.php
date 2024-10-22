<?php
include 'php/funciones.php'; // Incluir archivo de funciones

// Leer ejemplos y categorías
$examples = readExamples('bd/ejemplos.csv'); // Asegúrate de que esta función esté definida
$categories = readCategories('bd/categoria.csv'); // Asegúrate de que esta función esté definida

// Obtener todas las categorías para el menú
$category_options = "";
foreach ($categories as $category) {
    $category_options .= "<option value='{$category[0]}'>" . escapeHtml($category[1]) . "</option>";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include('config/head.php'); ?>
</head>

<body class="bg-gray-100 p-8">
    <header id="categoryDetails" class="bg-gray-700 text-white p-6 rounded-lg shadow-lg mb-8 text-center hidden">
        <h1 id="categoryTitle" class="text-4xl font-bold"></h1>
        <p id="categoryDescription" class="mt-4 text-lg"></p>
    </header>

    <nav class="bg-gray-800 p-4 rounded-lg mb-8 relative">
        <div class="flex">
            <div class="w-1/4 mr-4">
                <label for="categoryFilter" class="block text-white font-bold mb-2">Filtrar por Categoría:</label>
                <select id="categoryFilter" class="border p-2 mb-4">
                    <option value="">Todas las categorías</option>
                    <?php echo $category_options; ?>
                </select>
            </div>
            <div class="text-white mt-4 w-3/4">
                <p></p>
            </div>
        </div>
    </nav>

    <div class="flex">
        <div class="bg-gray-500 text-white p-4 rounded-lg w-1/4 mr-4">
            <?php include('config/sidebar.php'); ?>
        </div>

        <div id="exampleContainer" class="bg-gray-500 p-4 rounded-lg shadow-md w-3/4">
            <?php foreach ($examples as $example): ?>
                <div
                    class="rounded-lg shadow-lg p-6 example-item bg-gray-100 mb-6 category-<?php echo escapeHtml($example[5]); ?>">
                    <h2 class="text-3xl font-semibold text-gray-800 mb-6"><?php echo escapeHtml($example[1]); ?></h2>
                    <p class="text-gray-700 text-lg mb-4"><?php echo escapeHtml($example[2]); ?></p>

                    <?php if (!empty($example[3])) { ?>
                        <p>Ejemplo</p>
                        <div class="bg-white shadow-lg rounded-lg p-6 mb-4">
                            <?php echo htmlspecialchars_decode($example[3]); ?>
                        </div>
                    <?php } ?>

                    <?php if (!empty($example[4])) { ?>
                        <p>Código</p>
                        <pre class="bg-gray-200 shadow-lg p-4 rounded-lg overflow-x-auto mb-4">
                        <code><?php echo $example[4]; ?></code>
                    </pre>
                    <?php } ?>

                    <div class="border px-4 py-2">
                        <a href="f_repositorio_actualizar.php?id=<?php echo escapeHtml($example[0]); ?>"
                            class="text-blue-500 hover:underline">Editar</a>
                        <a href="#" class="abrirModal text-red-500 hover:underline ml-2"
                            data-id="<?php echo escapeHtml($example[0]); ?>">Eliminar</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full relative">
            <!-- Cerrar modal -->
            <button id="cerrarModal" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
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
                <h2 class="text-lg font-medium ml-4">Eliminar contenido</h2>
            </div>

            <!-- Mensaje del modal -->
            <p class="text-gray-600 mt-4">Al hacer clic en el botón "Eliminar", estás confirmando que deseas borrar este
                ejemplo de forma permanente. Esta acción no se puede deshacer y toda la información relacionada será
                eliminada de forma irreversible. Por favor, asegúrate de que realmente quieres proceder antes de
                continuar.</p>

            <!-- Botones -->
            <div class="flex justify-end mt-6 space-x-3">
                <button id="cerrarModal"
                    class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300">Cancelar</button>
                <a href="#" id="eliminarConfirmado"
                    class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">Eliminar</a>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.abrirModal').forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                const exampleId = this.dataset.id; // Obtiene el ID del ejemplo
                const eliminarLink = document.getElementById('eliminarConfirmado');
                eliminarLink.setAttribute('href', `repositorio/op_repositorio_eliminar.php?id=${exampleId}`);
                document.getElementById('modal').classList.remove('hidden');
            });
        });

        document.querySelectorAll('#cerrarModal').forEach(button => {
            button.addEventListener('click', function () {
                document.getElementById('modal').classList.add('hidden');
            });
        });
    </script>

    <script>
        document.getElementById('categoryFilter').addEventListener('change', function () {
            const filter = this.value; // Obtén el valor seleccionado

            // Filtrar ejemplos según la categoría seleccionada
            const exampleItems = document.querySelectorAll('.example-item');
            exampleItems.forEach(item => {
                if (filter === "" || item.classList.contains(`category-${filter}`)) {
                    item.style.display = 'block'; // Mostrar si coincide con la categoría
                } else {
                    item.style.display = 'none'; // Ocultar si no coincide
                }
            });

            // Mostrar detalles de la categoría seleccionada
            if (filter) {
                // Llamada a get_category_details.php para obtener detalles de la categoría seleccionada
                fetch(`php/get_category_details.php?id=${filter}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data) {
                            // Mostrar el título y la descripción de la categoría en el encabezado
                            document.getElementById('categoryTitle').textContent = data.title;
                            document.getElementById('categoryDescription').textContent = data.description;
                            document.getElementById('categoryDetails').classList.remove('hidden');
                        } else {
                            // Ocultar el encabezado si no hay datos
                            document.getElementById('categoryDetails').classList.add('hidden');
                        }
                    })
                    .catch(error => {
                        console.error('Error al obtener los detalles de la categoría:', error);
                        document.getElementById('categoryDetails').classList.add('hidden');
                    });
            } else {
                // Si no se selecciona ninguna categoría, ocultar el encabezado
                document.getElementById('categoryDetails').classList.add('hidden');
            }
        });
    </script>

</body>

</html>