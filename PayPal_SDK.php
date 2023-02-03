<!DOCTYPE html>
<html>
<head>
  <script src="https://www.paypal.com/sdk/js?client-id=AXu3itulJLGPDXYNVN9RPvzbyWlxQkVtQVdcFcHWzk8L7oSI1LS2oCA_dPM6uWLMazjgH_gLFkmyXxMp"></script>
</head>
<body>
  <div id="paypal-button-container"></div>
  <script>
    paypal.Buttons({
      createOrder: function(data, actions) {
        return actions.order.create({
          purchase_units: [{
            amount: {
              value: '9.99'
            }
          }]
        });
      },
      onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
          alert('Transaction completed by ' + details.payer.name.given_name);
        });
      }
    }).render('#paypal-button-container');
  </script>
</body>
</html>
