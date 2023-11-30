const nombre_tema = document.querySelector('.nombre_tema')
const descripcion = document.querySelector('.descripcion')

const btn = document.getElementById('boton')
const error = document.querySelector('.error')
const error2 = document.querySelector('.error2')

const regex = /^(?![0-9])[^0-9]*(?<![0-9])$/;



nombre_tema.addEventListener('change', (e) => {

    let nombre = e.target.value
    if (nombre.length == 0  ) {

        error.innerHTML="El campo de texto no debe estar vacío."
        btn.disabled = true;
        return
    }
    error.innerHTML=""
    btn.disabled = false;

}
)

descripcion.addEventListener('change', (e) => {

    let descripcion = e.target.value

    if (descripcion.length == 0  ) {


        error2.innerHTML="El campo  de descripcion  no debe estar vacío."
        btn.disabled = true;
        return
    }
    btn.disabled = false;
    error2.innerHTML=""

}
)


