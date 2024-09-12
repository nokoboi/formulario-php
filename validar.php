<?php

function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

$errores = [];

// Comprobar que se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Validar nombre
    if (empty($_POST['nombre'])) {
        $errores[] = 'El nombre es obligatorio';
    } else {
        $nombre = sanitize_input($_POST['nombre']);
    }

    // Validar correo
    if (empty($_POST['correo'])) {
        $errores[] = 'El correo electrónico es obligatorio';
    } elseif (!filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {
        $errores[] = 'El formato del correo electrónico no es válido';
    } else {
        $correo = sanitize_input($_POST['correo']);
    }

    // Validar contraseña
    if (empty($_POST['pass'])) {
        $errores[] = 'La contraseña es obligatoria';
    } else {
        $pass = sanitize_input($_POST['pass']); // Se puede dejar de usar o enmascarar
    }

    // Validar fecha
    if (empty($_POST['fecha'])) {
        $errores[] = 'La fecha es obligatoria';
    } else {
        $fecha = sanitize_input($_POST['fecha']);
    }

    // Validar color
    if (empty($_POST['eligeColor'])) {
        $errores[] = 'El color es obligatorio';
    } else {
        $eligeColor = sanitize_input($_POST['eligeColor']);
    }

    // Validar comentarios
    if (isset($_POST['comentarios'])) {
        $comentarios = sanitize_input($_POST['comentarios']);
    }

    if (empty($errores)) {
        echo "<h2>Datos del formulario:</h2>";
        echo "<p><strong>Nombre:</strong> " . $nombre . "</p>";
        echo "<p><strong>Dirección:</strong> " . (isset($_POST["direccion"]) ? sanitize_input($_POST["direccion"]) : "No proporcionada") . "</p>";
        echo "<p><strong>Correo:</strong> " . $correo . "</p>";
        echo "<p><strong>Contraseña:</strong> [Oculta por seguridad]</p>";
        echo "<p><strong>Antigüedad:</strong> " . $fecha . "</p>";
        echo "<p><strong>Color elegido:</strong> " . $eligeColor . "</p>";
        echo "<p><strong>Comentarios:</strong> " . (isset($comentarios) ? $comentarios : "No proporcionados") . "</p>";
        echo "<p><strong>Aceptó políticas:</strong> Sí</p>";
    } else {
        echo "<h2>Errores en el formulario:</h2>";
        echo "<ul>";
        foreach ($errores as $error) {
            echo "<li>" . sanitize_input($error) . "</li>";
        }
        echo "</ul>";
        echo "<p><a href='javascript:history.back()'>Volver al formulario</a></p>";
    }

}

