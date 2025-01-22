import './bootstrap';

// Abre el modal según su id recibido
window.openModal = function (modal) {

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

};

// Establece los valores en un formulario y lo abre como modal
window.openModalModifyUser = function (nombre, bloqueado, rol, rutaCreate, rutaDelete, modal) {
    const modalUser = document.getElementById(modal);

    modalUser.querySelector('#nombre').innerText = "Modificar usuario " + nombre;
    modalUser.querySelector('#bloqueado').value = bloqueado;
    modalUser.querySelector('#rol').value = rol;
    // Establecer la acción del formulario
    modalUser.querySelector('#editForm').setAttribute('action', rutaCreate);
    modalUser.querySelector('#delete').setAttribute('action', rutaDelete);

    openModal(modal);
}

window.openModalMakeReserve = function (experiencia_id, fechas) {
    const modalUser = document.getElementById('modal-new-reserve');

    const select = document.getElementById('data_options');

    modalUser.querySelector('#experiencia_id').value = experiencia_id;

    console.log(fechas);

    select.options.length = 0;
    const option = new Option('Selecciona', '0');
    
    option.selected = true;
    option.disabled = true;
    option.value = "";
    select.add(option);
    fechas.forEach(fecha => {

        const option = new Option(fecha.fecha, fecha.id);
        select.add(option);

    });

    openModal('modal-new-reserve');
}

window.addActivity = function (modal, experiencia_id) {
    const modalUser = document.getElementById(modal);

    modalUser.querySelector('#experiencia_id').value = experiencia_id;

    openModal(modal);
}

// Activa la opción de cerrar un formulario abierto tras un error de contenido
if (document.querySelector('.modal.show')) {
    const modalOpened = document.getElementsByClassName("modal show")[0];
    const closeModal = modalOpened.querySelector(".close");
    closeModal.addEventListener("click", () => {
        clearValidationErrors();
        modalOpened.classList.remove("show"); // Iniciar el fade-out
        setTimeout(() => (modalOpened.style.display = "none"),
            500); // Esperar la animación antes de ocultarlo
    });

}



// Esta función elimina todos los mensajes de error del formulario
window.clearValidationErrors = function () {
    // Eliminar errores del DOM
    const errorMessages = document.querySelectorAll('.error-message');
    errorMessages.forEach(error => error.remove());
}

window.updateSliderValue = function (value, output) {
    document.getElementById(output).textContent = value;
}

const imageViewer = {
    init: function () {
        this.launch();
    },
    launch: function () {

        console.log('imagen preview activado');

        document.getElementById('image-experience').addEventListener('change', function (event) {
            const file = event.target.files[0]; // Obtener el archivo seleccionado
            const preview = document.getElementById('preview'); // Elemento de previsualización
        
            if (file) {
                const reader = new FileReader();
        
                // Cuando se carga la imagen, actualizar el src del <img>
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block'; // Mostrar el recuadro con la imagen
                };
        
                reader.readAsDataURL(file); // Leer el archivo como una URL de datos
            } else {
                preview.src = '#';
                preview.style.display = 'none'; // Ocultar la previsualización si no hay imagen seleccionada
            }
        });

    }
};



// Se ejecuta al cargar la página
$(function () {
    const content = $('.content');



    // Si la página contiene la clase "inicio" ejecuta el carrusel
    if (content.hasClass('provider-menu')) {
        imageViewer.init();


    }
});
