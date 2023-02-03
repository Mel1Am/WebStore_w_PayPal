<!-- PHP code to establish connection with the localserver -->
<?php
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

// SQL query to select data from database
$sql = "SELECT Title,SKU,Price FROM Photos where ID = '1';";

$result = mysqli_query($con,$sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      echo "id: " . $row["SKU"]. " - Name: " . $row["Title"]. " " . $row["Price"]. "<br>";
    }
  } else {
    echo "0 results";
  }

// close connection
    //mysqli_close($con);
?>