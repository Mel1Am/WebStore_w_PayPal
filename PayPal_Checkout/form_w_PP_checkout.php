
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FrontEnd Store</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://www.paypal.com/sdk/js?client-id=AXu3itulJLGPDXYNVN9RPvzbyWlxQkVtQVdcFcHWzk8L7oSI1LS2oCA_dPM6uWLMazjgH_gLFkmyXxMp"></script>

</head>
<body>
    <header class="header">
        <a href="index.html">
            <img class="header__logo" src="img/logo.png" alt="Logotipo">
        </a>
    </header>

    <nav class="navegacion">
        <a class="navegacion__enlace navegacion__enlace--activo" href="index.html">Store</a>
        <a class="navegacion__enlace" href="nosotros.html">About</a>
    </nav>

<main class="contenedor">
    <h1>Thank you for Purchasing With Us!</h1>
    
    <div id="paypal-button-container"></div>

    <script>
        paypa.Buttons({
            style:{
                color: 'blue',
                shape: 'pill',
                lalbel: 'pay'
            },
            createOrder: function(data,actions){
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value:100
                        }
                    }]
                });
            },

            onApprove: function(data, actions){
                actions.order.capture().then(function(detalles){
                    console.log(detalles);
                    window.location.href="completado.html"
                });
            },
            oncancel: function(data){
                alert("Pago Cancelado");
                console.log(data);
            }
        }).render('#paypal-button-container')
    </script>

    </main>

    <footer class="footer">
        <p class="footer__texto">Front End Store - Todos los derechos Reservados 2022.</p>
    </footer>
    
</body>
</html>
