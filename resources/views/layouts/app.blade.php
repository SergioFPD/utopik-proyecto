<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* Estilos del modal */
        .modal {
            display: none;
            /* Oculto por defecto */

        }

        .modal.center {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Fondo semi-transparente */
            justify-content: center;
            align-items: center;
            opacity: 0;
            /* Comienza completamente invisible */
            transition: opacity 0.5s ease;
            /* Transición para el fade-in */

        }

        .modal.show {
            display: flex !important;
            /* Mostrar el modal */
            opacity: 1;
            /* Visible completamente */
        }

        .modal-content {
            position: relative;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px 8px 0 0;
            /* Bordes redondeados solo arriba */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;

            animation: slideUp 0.5s ease-in-out;
        }

        .modal.hide .modal-content {
            animation: slideDown 0.5s ease-in-out forwards;
            /* Animación inversa */
        }

        .close {
            color: #aaa;
            font-size: 24px;
            font-weight: bold;
            position: absolute;
            top: 10px;
            right: 20px;
            cursor: pointer;
        }

        .close:hover {
            color: #000;
        }

        .modal-login-row:hover .modal.login {

            display: block !important;
        }
    </style>

</head>

<body>
    {{-- Menu de navegación --}}
    @include('_components.menu')

    <div style="background-color: rgb(78, 219, 97)">
        <h1>CUERPO DE APP</h1>
        {{-- Contendio del cuerpo --}}
        @yield('content')
    </div>

    <script>
        function openModal(modal) {
            // Obtener los elementos
            const modalWindow = document.getElementById(modal);
            const closeModal = modalWindow.querySelector(".close");

            // Abrir el modal con efecto de fade-in
            modalWindow.style.display = "flex"; // Mostrar el modal
            setTimeout(() => modalWindow.classList.add("show"), 10); // Iniciar la animación


            // Cerrar el modal con efecto de fade-out
            closeModal.addEventListener("click", () => {
                modalWindow.classList.remove("show"); // Iniciar el fade-out
                setTimeout(() => (modalWindow.style.display = "none"),
                    500); // Esperar la animación antes de ocultarlo
            });

            // Cerrar el modal al hacer clic fuera del contenido
            window.addEventListener("click", (e) => {
                if (e.target === modalWindow) {
                    modalWindow.classList.remove("show"); // Iniciar el fade-out
                    setTimeout(() => (modalWindow.style.display = "none"),
                        500); // Esperar la animación antes de ocultarlo
                }
            });

        }

        // Función para abrir el modal para modificar un usuario
        function openModalModifyUser(id, nombre, bloqueado, rol) {
            const modalUser = document.getElementById("modal-userdata");


            setTimeout(() => modalUser.classList.add("show"), 10); // Iniciar la animación

            document.getElementById('userId').value = id;
            document.getElementById('nombre').value = nombre;
            document.getElementById('bloqueado').value = bloqueado;
            document.getElementById('rol').value = rol;
            // Establecer la acción del formulario
            document.getElementById('editForm').action = "{{ route('admin.update.user', ':id') }}".replace(':id', id);

            // Cerrar el modal al hacer clic fuera del contenido
            window.addEventListener("click", (e) => {
                if (e.target === modalUser) {
                    modalUser.classList.remove("show"); // Iniciar el fade-out
                    setTimeout(() => (modalUser.style.display = "none"),
                        500); // Esperar la animación antes de ocultarlo
                }
            });
        }


        if (document.querySelector('.modal.show')) {
            const modalOpened = document.getElementsByClassName("modal show")[0];
            const closeModal = modalOpened.querySelector(".close");
            closeModal.addEventListener("click", () => {
                modalOpened.classList.remove("show"); // Iniciar el fade-out
                setTimeout(() => (modalOpened.style.display = "none"),
                    500); // Esperar la animación antes de ocultarlo
            });

        }
    </script>
</body>

</html>
