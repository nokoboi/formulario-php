// Cuando se haya cargado el html se ejecuta la función.
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('formulario');
    const mensajeError = document.getElementById('mensajeError');

    form.addEventListener('submit', function (event) {
        let errores = [];
        const regex = new RegExp("[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,5}");

        const nombre = document.getElementById('nombreForm');
        if (nombre.value.trim() === '') {
            errores.push('El nombre es obligatorio');
        }

        const correo = document.getElementById('emailForm')
        if (correo.value.trim() === 0) {
            errores.push('El email es obligatorio');
        } else if (!regex.test(correo.value)) {
            errores.push('El email no tiene un formato correcto')
        }

        // Validad color
        const colores=document.querySelectorAll('input[name="eligeColor"]:checked');
        if(colores.length === 0){
            errores.push('Por favor selecciona un color');
        }

        //let colorSeleccionado = false;
        // colores.forEach(color => {
        //     if(color.checked){
        //         colorSeleccionado=true;
        //     }
        // });

        // if(!colorSeleccionado){
        //     errores.push('Por favor selecciona un color');
        // }

        // politicas de privacidad
        const acepto = document.getElementById('terminos');
        if(!acepto.checked){
            errores.push('Debes aceptar las politicas de privacidad')
        }
       
        if (errores.length > 0) {
            event.preventDefault()
            mensajeError.textContent = errores.join(' ');
            mensajeError.classList.remove('oculto');

        } else {
            // mostrar los errores
            mensajeError.classList.add('oculto');
        }
    })
})

