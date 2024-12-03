<?php
// Incluye la biblioteca QR Code
include('phpqrcode/qrlib.php');

// Verifica si se envió un formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén el texto del formulario
    $text = $_POST['text'];

    // Ruta donde se guardará el código QR generado
    $filePath = 'qrcodes/';
    if (!file_exists($filePath)) {
        mkdir($filePath, 0777, true);
    }

    // Nombre del archivo para el código QR
    $fileName = $filePath . 'qr_' . time() . '.png';

    // Genera el código QR
    QRcode::png($text, $fileName, QR_ECLEVEL_L, 10);

    echo "Código QR generado exitosamente. <br>";
    echo "<img src='$fileName' alt='Código QR'>";
    echo "<br><a href='$fileName' download>Descargar Código QR</a>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Códigos QR</title>
</head>
<body>
    <h1>Generador de Códigos QR</h1>
    <form method="POST">
        <label for="text">Texto para generar el QR:</label>
        <input type="text" id="text" name="text" required>
        <button type="submit">Generar QR</button>
    </form>
</body>
</html>
