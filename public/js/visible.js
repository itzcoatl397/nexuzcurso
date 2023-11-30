
// Selecciona todos los elementos con la clase "flexSwitchCheckDefault"
const switchInputs = document.querySelectorAll(".flexSwitchCheckDefault");
const id_curso = document.querySelector(".id_curso");

// Itera sobre los elementos para agregar un evento de cambio a cada uno
switchInputs.forEach(switchInput => {
    switchInput.addEventListener('change', (e) => {
        if (switchInput.checked) {

            const data = {
                boolean_value: 1, // Cambia 0 por el valor booleano que desees
            };

            // Recupera el ID del curso del campo oculto en el mismo formulario
            const id_curso = switchInput.closest("form").querySelector(".id_curso").value;

            if (id_curso) {
                console.log(id_curso);

                // Realiza una solicitud POST a la ruta de la API en Laravel
                axios.post(`http://127.0.0.1:8000/api/changeNoVisible/${id_curso}`, data)
                    .then(response => {
                        // Maneja la respuesta JSON

                      location.reload()
                    })
                    .catch(error => {
                        // Maneja errores si los hay
                        console.error(error);
                    });
            }
        } else {



            // Recupera el ID del curso del campo oculto en el mismo formulario
            const id_curso2 = switchInput.closest("form").querySelector(".id_curso").value;

            if (id_curso2) {


                // Realiza una solicitud POST a la ruta de la API en Laravel
                axios.post(`http://127.0.0.1:8000/api/changeNoVisible/${id_curso2}`, 0)
                    .then(response => {
                        // Maneja la respuesta JSON
                       alert("El Curso no esta visible")
                       location.reload()
                    })
                    .catch(error => {
                        // Maneja errores si los hay
                        console.error(error);
                    });
            }
        }
    });
});
