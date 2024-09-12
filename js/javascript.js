import { validarContrasena } from "./validarContrasena.js";
  
//   // Ejemplo de uso
//   console.log(validarContraseña("Abc123!@#")); // true
//   console.log(validarContraseña("abc123")); // false (falta mayúscula y carácter especial)
//   console.log(validarContraseña("ABCDEF123!")); // false (falta minúscula)
//   console.log(validarContraseña("Abcdef123!")); // true
//   console.log(validarContraseña("Abcaaaa123!")); // false (más de 3 caracteres iguales seguidos)
//   console.log(validarContraseña("Abc123!@#$%^&*()_+-=")); // false (más de 16 caracteres)

// Cuando se haya cargado el html se ejecuta la función.
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('formulario');
    const mensajeError = document.getElementById('mensajeError');

    form.addEventListener('submit', function (event) {
        let errores = [];
        const regex = new RegExp("[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,5}");
        const regexPass = new RegExp("/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.* ).{8,16}$/");

        const nombre = document.getElementById('nombreForm');
        if (nombre.value.trim() === '') {
            errores.push('El nombre es obligatorio');
        }

        const pass = document.getElementById('passForm');
        if(pass.value === ''){
            errores.push('La contraseña es obligatoria')
        }
        else if(!validarContrasena(pass.value)){
            errores.push('El formato de la contraseña no es válido');
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

