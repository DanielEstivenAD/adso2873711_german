<!DOCTYPE html>
<html lang="es">

<head>
    <?php include('config/head.php'); ?>
</head>

<body class="bg-gray-100 p-8">
    <header class="bg-gray-700 text-white p-6 rounded-lg shadow-lg mb-8 text-center">
        <h1 class="text-4xl font-bold">Guía Completa del CRUD CSV</h1>
        <p class="mt-4 text-lg">Explora los fundamentos para crear un CRUD con PHP y una base de datos CSV</p>
    </header>

    <div class="flex">
        <div class="bg-gray-500 text-white p-4 rounded-lg w-1/4 mr-4">
            <?php include('config/sidebar.php'); ?>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md w-3/4">
            <section>
                <h2 class="text-3xl font-semibold text-gray-800 mb-6">¿Qué es una base de datos CSV?</h2>
                <p class="text-gray-700 text-lg mb-4 text-justify">
                    Un archivo CSV (Comma-Separated Values) es un formato simple de almacenamiento de datos en el que la
                    información está separada por comas. Cada línea del archivo representa un registro, y cada dato
                    dentro de una línea es un campo de ese registro. Es comúnmente utilizado para intercambiar datos
                    entre aplicaciones de forma sencilla.
                </p>
                <p class="text-gray-700 text-lg mb-4 text-justify">
                    En el contexto de un CRUD (Crear, Leer, Actualizar, Eliminar), un archivo CSV actúa como una base de
                    datos ligera donde los datos pueden ser gestionados mediante PHP.
                </p>
            </section>
            <section class="mt-12">
                <h2 class="text-3xl font-semibold text-gray-800 mb-6">Ventajas de usar una base de datos CSV</h2>
                <ul class="list-disc list-inside text-gray-700 text-lg">
                    <li><strong>Simplicidad: </strong>Un archivo CSV es fácil de crear y manejar, ya que se trata de un
                        simple archivo de texto plano.</li>
                    <li><strong>Compatibilidad: </strong>Los CSV son compatibles con una amplia gama de programas y
                        lenguajes de programación, facilitando la importación y exportación de datos.</li>
                    <li><strong>Portabilidad: </strong>Los archivos CSV son pequeños en tamaño y se pueden mover
                        fácilmente de un sistema a otro.</li>
                    <li><strong>Lectura humana: </strong>A diferencia de otras bases de datos, los CSV pueden ser
                        abiertos y editados con programas comunes como un editor de texto o una hoja de cálculo, lo que
                        facilita la visualización directa de los datos.</li>
                </ul>
            </section>
            <section class="mt-12">
                <h2 class="text-3xl font-semibold text-gray-800 mb-6">Desventajas de usar una base de datos CSV</h2>
                <ul class="list-disc list-inside text-gray-700 text-lg">
                    <li><strong>No apto para grandes volúmenes de datos: </strong>Los archivos CSV no son recomendables
                        para almacenar grandes cantidades de información, ya que la búsqueda y manipulación de datos
                        puede volverse lenta.</li>
                    <li><strong>Sin soporte de relaciones: </strong>A diferencia de bases de datos relacionales, un CSV
                        no puede manejar relaciones complejas entre los datos.</li>
                    <li><strong>Falta de seguridad: </strong>No es un formato seguro; los datos no están cifrados y no
                        hay mecanismos de autenticación o permisos de acceso.</li>
                    <li><strong>Problemas de concurrencia: </strong>No es adecuado para sistemas donde múltiples
                        usuarios intentan modificar los datos simultáneamente, lo que puede generar conflictos.</li>
                </ul>
            </section>
            <section class="mt-12">
                <h2 class="text-3xl font-semibold text-gray-800 mb-6">Características clave de un sistema CRUD con CSV
                </h2>
                <div class="grid grid-cols-2 gap-8">
                    <div class="bg-gray-50 p-6 rounded-lg shadow-lg">
                        <h3 class="text-2xl font-semibold text-gray-800 mb-2">Crear: </h3>
                        <p class="text-gray-700 text-lg">
                            Se pueden añadir nuevas filas al archivo CSV, representando nuevos registros.
                        </p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-lg shadow-lg">
                        <h3 class="text-2xl font-semibold text-gray-800 mb-2">Leer: </h3>
                        <p class="text-gray-700 text-lg">
                            Los datos del archivo CSV se pueden extraer y mostrar en una interfaz web.
                        </p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-lg shadow-lg">
                        <h3 class="text-2xl font-semibold text-gray-800 mb-2">Actualizar: </h3>
                        <p class="text-gray-700 text-lg">
                            Los registros existentes se pueden modificar.
                        </p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-lg shadow-lg">
                        <h3 class="text-2xl font-semibold text-gray-800 mb-2">Eliminar: </h3>
                        <p class="text-gray-700 text-lg">
                            Se puede eliminar una fila del archivo CSV para eliminar un registro.
                        </p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-lg shadow-lg">
                        <h3 class="text-2xl font-semibold text-gray-800 mb-2">Integración con PHP: </h3>
                        <p class="text-gray-700 text-lg">
                            Utilizando PHP, se puede manipular un archivo CSV como si fuera una base de datos, usando
                            funciones nativas como fopen(), fputcsv(), fgetcsv() para gestionar el archivo.
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <?php include('config/footer.php'); ?>
</body>

</html>