<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo_palco = $_POST['tipo_palco'] ?? '';
    $correo = $_POST['correo'] ?? '';
<<<<<<< HEAD
    $apellido = $_POST['apellido'] ?? '';
=======
>>>>>>> cbfa147e777e1715a42d11ebd71e193a7b47c46e
    $fecha = $_POST['fecha'] ?? '';
    $hora = $_POST['hora'] ?? '';
    $discoteca = $_POST['discoteca'] ?? '';

    $reserva = [
        'tipo_palco' => $tipo_palco,
        'correo' => $correo,
<<<<<<< HEAD
        'apellido' => $apellido,
=======
>>>>>>> cbfa147e777e1715a42d11ebd71e193a7b47c46e
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
