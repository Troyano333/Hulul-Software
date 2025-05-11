<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo_palco = $_POST['tipo_palco'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $fecha = $_POST['fecha'] ?? '';
    $hora = $_POST['hora'] ?? '';
    $discoteca = $_POST['discoteca'] ?? '';

    $reserva = [
        'tipo_palco' => $tipo_palco,
        'correo' => $correo,
        'apellido' => $apellido,
        'fecha' => $fecha,
        'hora' => $hora,
        'discoteca' => $discoteca
    ];

    $json = json_encode($reserva);
    echo "
    <script>
        sessionStorage.setItem('reserva', JSON.stringify($json));
        window.location.href = '../confirmacion_pago.html';
    </script>";
} else {
    echo "No hay datos de reserva.";
}
?>
