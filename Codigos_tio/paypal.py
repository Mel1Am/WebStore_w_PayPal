<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
  <input type="hidden" name="cmd" value="_xclick">
  <input type="hidden" name="business" value="payment@yourbusiness.com">
  <input type="hidden" name="item_name" value="Item Name">
  <input type="hidden" name="item_number" value="Item Number">
  <input type="hidden" name="amount" value="1.00">
  <input type="hidden" name="currency_code" value="USD">
  <input type="image" name="submit"
    src="https://www.paypal.com/en_US/i/btn/btn_buynow_LG.gif"
    alt="PayPal - The safer, easier way to pay online">
</form>
Lado cliente CSS
<form action="paypal_payment.php" method="post">
  <input type="hidden" name="item_name" value="Producto X">
  <input type="hidden" name="item_price" value="100">
  <input type="submit" value="Pagar con PayPal">
</form>
Lado servidor PHP
<?php
  // Recibir los datos del formulario
  $item_name = $_POST['item_name'];
  $item_price = $_POST['item_price'];
  
  // Conexión a la base de datos MySQL
  $servername = "localhost";
  $username = "username";
  $password = "password";
  $dbname = "database_name";

  // Crear la conexión
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Verificar la conexión
  if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
  }

  // Insertar datos en la tabla de la base de datos
  $sql = "INSERT INTO pagos (nombre, precio)
  VALUES ('$item_name', '$item_price')";

  if (mysqli_query($conn, $sql)) {
    // Redireccionar al pago con PayPal
    header("Location: https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=you@youremail.com&item_name=$item_name&amount=$item_price");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
?>
