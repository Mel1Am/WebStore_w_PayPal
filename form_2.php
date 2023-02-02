<?php
    // getting all values from the HTML form
    if(isset($_POST['submit']))
    {

        //Shipping Address Variables
        $Street = $_POST['Street'];
        $Zip = $_POST['Zip'];
        $State = $_POST['State'];
        $Country = $_POST['Country'];


    }

    // database details
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "PayPal";

    // creating a connection
    $con = mysqli_connect($servername, $username, $password, $dbname);

    // to ensure that the connection is made
    if (!$con)
    {
        die("Connection failed!" . mysqli_connect_error());
    }echo "Connected successfully";

    // using sql to create a data entry query
    $sql = "INSERT INTO Addresses (Fname, Lname, Email, PNumber) VALUES ('$fname', '$lname', '$email', '$Pnumber')";
    //$sql = "INSERT INTO Addresses (Street, ZipCode, State, Country) VALUES ('$Street', '$Zip', '$State', '$Country')";

    // send query to the database to add values and confirm if successful
    $rs = mysqli_query($con, $sql);
    if($rs)
    {
        echo "Entries added!";
    }else {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
    // close connection
    mysqli_close($con);

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FrontEnd Store</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
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
    </main>

    <footer class="footer">
        <p class="footer__texto">Front End Store - Todos los derechos Reservados 2022.</p>
    </footer>
    
</body>
</html>
