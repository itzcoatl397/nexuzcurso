
const check_imagen = document.querySelector('.subir_imagen')
const imagen = document.querySelector('.imagen')
const check_pdf = document.querySelector('.subir_pdf')
const pdf = document.querySelector('.pdf')
const check_video = document.querySelector('.subir_video')
const video = document.querySelector('.video')

const check_texto = document.querySelector('.subir_texto')
const texto = document.querySelector('.texto')

const enviar  = document.querySelector('.enviar');

check_imagen.addEventListener('change', checkImageInput)

check_pdf.addEventListener('change',checkPdfInput)

check_video.addEventListener('change',checkVideoInput)


check_texto.addEventListener('change',  checkTextoInput)




function    checkImageInput () {

        if (check_imagen.checked) {
            imagen.style.display='flex';

            enviar.disabled = false

        }else{
            imagen.style.display='none';
            btn.disabled = true
        }
}


function checkPdfInput() {

    if (check_pdf.checked) {
        pdf.style.display='';
        enviar.disabled = false
    }else{
        pdf.style.display='none';
        enviar.disabled = !false
    }
}

function checkVideoInput() {
    if (check_video.checked) {
        video.style.display='';
        enviar.disabled = false
    }else{
        video.style.display='none';
        enviar.disabled = !false

    }
}

function checkTextoInput() {
    if (check_texto.checked) {
        texto.style.display='';
        enviar.disabled = false
    }else{
        texto.style.display='none';
        enviar.disabled = !false
    }
}




enviar.disabled = true

