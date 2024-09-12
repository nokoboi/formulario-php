<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario PHP - Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> -->
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="container">
        <h2>Formulario</h2>
        <form action="validar.php" method="POST" enctype="multipart/form-data" id="formulario">
            <div class="form-group">
                <label for="nombre" class="form-label">Nombre*</label>
                <input type="text" class="form-control" id="nombreForm" name="nombre" placeholder="Jhon Doe" required>
            </div>

            <div class="form-group">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="dirForm" name="direccion" placeholder="Calle Ramos 3">
            </div>

            <div class="form-group">
                <label for="correo" class="form-label">Dirección de correo*</label>
                <input type="email" class="form-control" id="emailForm" name="correo" placeholder="name@example.com"
                    required>
            </div>

            <div class="form-group">
                <label for="pass" class="form-label">Contraseña:*</label>
                <input type="password" class="form-control" id="passForm" name="pass" placeholder="Contraseña" required>
            </div>

            <div class="form-group">
                <label for="fecha" class="form-label">Antigüedad:*</label>
                <input type="date" id="fecha" name="fecha" class="form-control">
            </div>


            <p>Elige el color:</p>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="eligeColor" id="eligeRojo" value="rojo">
                <label class="form-check-label" for="eligeColor">
                    Rojo
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="eligeColor" id="eligAzul" value="azul">
                <label class="form-check-label" for="eligeColor">
                    Azul
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="eligeColor" id="eligeVerde" value="verde">
                <label class="form-check-label" for="eligeColor">
                    Verde
                </label>
            </div>

            <div class="form-group">
                <label for="comentarios" class="form-label">Comentarios:</label>
                <textarea class="form-control" id="comentarios" rows="3" name="comentarios"></textarea>
            </div>
            <div class="form-group form-check mt-3 mb-3">
                <input class="form-check-input" type="checkbox" id="terminos" required>
                <label class="form-check-label" for="terminos">Acepto los términos y condiciones*</label>
            </div>

            <div class="alert alert-danger oculto" id="mensajeError" role="alert">
                
            </div>

            <button type="submit" class="btn btn-primary" id="boton">Enviar</button>
            <button type="reset" class="btn btn-secondary">Limpiar formulario</button>

            <p>Los campos con * son obligatorios</p>
        </form>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="module"  src="js/javascript.js"></script>
</body>

</html>