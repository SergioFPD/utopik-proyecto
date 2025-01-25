import './bootstrap';

// Abre (desoculta) el modal según su id recibido
window.openModal = function (modal) {

    // Obtener los elementos
    const modalWindow = document.getElementById(modal);

    // Botón cerrar del modal
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

// Inserta una página modal recibida por la ruta de un controlador
window.insertModalPage = function (ruta, modalName) {

    // Línea HTML en la que se agregará la página modal
    // HA DE ESTAR DEFINIDA EN LA PÁGINA
    const modalContent = document.getElementById('modalPageContent');
    const spinner = document.getElementById('spinner');

    spinner.style.display = 'block';
    // Realiza una solicitud AJAX para cargar el contenido del modal
    fetch(ruta)
        .then(response => response.text())
        .then(html => {
            modalContent.innerHTML = html; // Inserta el contenido en el modal
            // Una vez insertada la página modal, la visualiza
            spinner.style.display = 'none';
            openModal(modalName);
        })
        .catch(error => {
            alert('Error al cargar el contenido');

        });
}

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

// Abre el modal de añadir actividad y le asigna un id al input experiencia_id
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

// Elimina todos los mensajes de error del formulario
window.clearValidationErrors = function () {
    // Eliminar errores del DOM
    const errorMessages = document.querySelectorAll('.error-message');
    errorMessages.forEach(error => error.remove());
}

// En los formularios con un slider selector, cambia el valor del output por
// el valor seleccionado en el selector
// Calcula el precio total y lo establece en total-price
window.updateSliderValue = function (value, output, priceAdult, priceChild) {
    document.getElementById(output).textContent = value;
    const adult = parseInt(document.getElementById('value-adults').value);
    const child = parseInt(document.getElementById('value-child').value);
    document.getElementById('total-price').textContent = "TOTAL: " + ((priceAdult * adult) + (priceChild * child)) + "€";
}


// Se ejecuta dentro de la página correspondiente
// Se ocupa de añadir una fecha a un listado y prepara el array
// para el controlador
const multipleDates = {
    init: function () {
        this.launch();
    },
    launch: function () {

        const idiomaPagina = document.documentElement.lang;
        var textoBoton = "Add new date";
        if (idiomaPagina == 'es') {
            textoBoton = "Añade nueva fecha";
        }
        const fechaInput = document.getElementById('fechaInput');
        fechaInput.value = textoBoton;
        const listaFechas = document.getElementById('listaFechas');
        const fechasHidden = document.getElementById('fechasHidden');
        let fechas = JSON.parse(fechasHidden.value);

        $("#fechaInput").datepicker({
            showButtonPanel: true,  // Opcional, muestra el panel con "Hoy" y "Cerrar"
            dateFormat: "yy-mm-dd",  // Establece el formato de la fecha
            onSelect: function (dateText, inst) {
                if (dateText) {
                    // Agregar la fecha al array y renderizar la lista
                    fechas.push(dateText);
                    renderListaFechas();
                    fechaInput.value = textoBoton;

                }
            }
        });


        // Actualiza la lista de fechas
        function renderListaFechas() {
            // Vaciar la lista actual
            listaFechas.innerHTML = '';

            // Crear nuevos elementos de la lista
            fechas.forEach((fecha, index) => {
                const li = document.createElement('li');
                li.textContent = fecha;

                // Botón para eliminar la fecha
                const eliminarBtn = document.createElement('button');
                eliminarBtn.textContent = 'Eliminar';
                eliminarBtn.type = 'button';
                eliminarBtn.addEventListener('click', () => {
                    // Eliminar la fecha del array y renderizar de nuevo
                    fechas.splice(index, 1);
                    renderListaFechas();
                });

                li.appendChild(eliminarBtn);
                listaFechas.appendChild(li);
            });

            // Actualizar el campo oculto con el valor que se enviará al controlador
            fechasHidden.value = JSON.stringify(fechas);
        }

        // Pone las fechas que ya tiene la experiencia al cargar la página
        renderListaFechas();
    }
};

// Se carga en la página correspondiente
// Se encarga de mostrar en un div la imagen seleccionada
const imageViewer = {
    init: function () {
        this.launch();
    },
    launch: function () {

        console.log('imagen preview activado');

        document.getElementById('image').addEventListener('change', function (event) {
            const file = event.target.files[0]; // Obtener el archivo seleccionado
            const preview = document.getElementById('image-preview'); // Elemento de previsualización

            if (file) {
                const reader = new FileReader();

                // Cuando se carga la imagen, actualizar el src del <img>
                reader.onload = function (e) {
                    preview.src = e.target.result;

                };

                reader.readAsDataURL(file); // Leer el archivo como una URL de datos
            } else {
                preview.src = '#';
            }
        });

    }
};


// Se ejecuta al cargar la página (JQUERY)
$(function () {
    // Recoge el valor de la clase content de la página
    const content = $('.content');

    // Si la página es la del menú proveedor ejecuta las funciones que va a utilizar
    // -- Esto evita que esas funciones se carguen en todas las páginas --
    if (content.hasClass('form-experience')) {
        imageViewer.init();
        multipleDates.init();
    }
});
