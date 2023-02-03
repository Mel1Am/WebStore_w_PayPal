<button id="showArticle">Mostrar artículo</button>
<div id="article" style="display: none;">
  <h2>Título del artículo</h2>
  <p>Contenido del artículo</p>
</div>

<script>
  document.getElementById("showArticle").addEventListener("click", function() {
    document.getElementById("article").style.display = "block";
  });
</script>
2.	Lado del servidor:
•	PHP Procesamiento de datos y envío de respuestas al cliente. API paypal
<?php
  require 'vendor/autoload.php';
  
  use PayPal\Api\Amount;
  use PayPal\Api\Details;
  use PayPal\Api\Item;
  use PayPal\Api\ItemList;
  use PayPal\Api\Payer;
  use PayPal\Api\Payment;
  use PayPal\Api\RedirectUrls;
  use PayPal\Api\Transaction;
  
  // Crear un objeto Payer y establecer su método de pago
  $payer = new Payer();
  $payer->setPaymentMethod("paypal");
  
  // Crear un objeto Item y añadirlo a la lista de artículos
  $item = new Item();
  $item->setName("Artículo 1")
       ->setCurrency("USD")
       ->setQuantity(1)
       ->setPrice(10);
  $itemList = new ItemList();
  $itemList->setItems([$item]);
  
  // Crear un objeto Details para establecer el subtotal
  $details = new Details();
  $details->setSubtotal(10);
  
  // Crear un objeto Amount para establecer el total
  $amount = new Amount();
  $amount->setCurrency("USD")
         ->setTotal(10)
         ->setDetails($details);
  
  // Crear un objeto Transaction para añadir los detalles de la transacción
  $transaction = new Transaction();
  $transaction->setAmount($amount)
