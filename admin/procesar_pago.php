<?php
require_once '../vendor/autoload.php';
\Stripe\Stripe::setApiKey('REMOVED51RWeDnRLbhQR4V593QWmUT3Cg8KBKih3d3lbtdSH2jpwZMN8mu6W4wLnrt25oRj6zSZgtTSpvhJbgxsVoHl1FE8z00viUEqglc');

$token = $_POST['stripeToken'];
$total = floatval($_POST['total']);
$cantidad = intval($total * 100); 

try {
    $charge = \Stripe\Charge::create([
        'amount' => $cantidad,
        'currency' => 'usd',
        'description' => 'Compra con Stripe',
        'source' => $token,
    ]);

    echo "<h2>Pago con Stripe exitoso</h2>";
    echo "<p>Monto: $" . number_format($total, 2) . "</p>";

} catch (\Stripe\Exception\CardException $e) {
    echo "<h2>Error con Stripe</h2>";
    echo "<p>" . $e->getError()->message . "</p>";
}
?>
