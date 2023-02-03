<?php
if (isset($_POST['amount'])) {
  // Conectarse a la base de datos MySQL
  $conn = mysqli_connect("localhost", "username", "password", "database");

  // Insertar los datos del pago en la base de datos
  $amount = $_POST['amount'];
  $sql = "INSERT INTO payments (amount) VALUES ($amount)";
  mysqli_query($conn, $sql);

  // Cerrar la conexión con la base de datos
  mysqli_close($conn);
}
?>
<?php

// Recibir los datos del formulario de pago
$amount = $_POST['amount'];
$currency = $_POST['currency'];

// Crear una transacción en PayPal
$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'CLIENT_ID',
        'CLIENT_SECRET'
    )
);

$transaction = new \PayPal\Api\Transaction();
$amount = new \PayPal\Api\Amount();
$amount->setCurrency($currency)
    ->setTotal($amount);

$transaction->setAmount($amount);

$redirectUrls = new \PayPal\Api\RedirectUrls();
$redirectUrls->setReturnUrl("http://your-return-url.com")
    ->setCancelUrl("http://your-cancel-url.com");

$payment = new \PayPal\Api\Payment();
$payment->setIntent("sale")
    ->setPayer($payer)
    ->setTransactions(array($transaction))
    ->setRedirectUrls($redirectUrls);

try {
    $payment->create($apiContext);
} catch (\PayPal\Exception\PayPalConnectionException $ex) {
    // Manejar un error aquí
}

// Almacenar los detalles de la transacción en la base de datos
$conn = new mysqli('host', 'user', 'password', 'database');
$conn->query("INSERT INTO transactions (payment_id, amount, currency, status) VALUES ('$payment->getId()', '$amount', '$currency', 'created')");

// Redirigir al usuario a PayPal para que complete el pago
header("Location: " . $payment->getApprovalLink());
exit;

?>
