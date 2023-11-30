
// Obtén todos los elementos con la clase "subir_imagen", "subir_pdf", "subir_video" y "subir_texto"
const checkboxes = document.querySelectorAll('.subir_imagen, .subir_pdf, .subir_video, .subir_texto');

// Itera a través de los elementos y agrega un evento a cada uno
checkboxes.forEach((checkbox) => {
    checkbox.addEventListener('change', () => {
        const modal = checkbox.closest('.modal'); // Encuentra el modal que contiene el checkbox
        const imagen = modal.querySelector('.imagen');
        const pdf = modal.querySelector('.pdf');
        const video = modal.querySelector('.video');
        const texto = modal.querySelector('.texto');
        const enviar = modal.querySelector('.enviar');

        // Función para verificar el estado del checkbox y actualizar los elementos en el modal
        function checkInput(checkbox, element) {
            if (checkbox.checked) {
                element.style.display = 'flex';
            } else {
                element.style.display = 'none';
            }
        }

        // Llama a la función para cada tipo de elemento
        if (checkbox.classList.contains('subir_imagen')) {
            checkInput(checkbox, imagen);
        } else if (checkbox.classList.contains('subir_pdf')) {
            checkInput(checkbox, pdf);
        } else if (checkbox.classList.contains('subir_video')) {
            checkInput(checkbox, video);
        } else if (checkbox.classList.contains('subir_texto')) {
            checkInput(checkbox, texto);
        }

        // Habilita o deshabilita el botón de enviar según el estado de los checkboxes
        const checkboxesInModal = modal.querySelectorAll('input[type="checkbox"]');
        const anyCheckboxChecked = Array.from(checkboxesInModal).some((cb) => cb.checked);
        enviar.disabled = !anyCheckboxChecked;
    });
});
