<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laundry_service";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

// Get form data
$customer = $_POST['customer'];
$weight = $_POST['weight'];
$estimasi = $_POST['estimasi'];
$service = $_POST['service'];
$item = $_POST['item'];

// Insert data into database
$sql = "INSERT INTO orders (customer, weight, estimasi, service, item) VALUES ('$customer', '$weight', '$estimasi', '$service', '$item')";

if ($conn->query($sql) === TRUE) {
  ?>
  <html>
      <head>
          <style>
              .success-message {
                  text-align: center;
                  font-size: 24px;
                  font-weight: bold;
                  color: #008000; /* green color */
                  margin-top: 20%;
              }
          </style>
      </head>
      <body>
          <div class="success-message">
              Pesanan berhasil. Anda akan kembali ke Halaman Awal.
          </div>
          <?php
          // Redirect to initial page after 2 seconds
          header("Refresh: 1; URL=http://localhost/Express%20Laundry/static/template/index.html#Home");
          exit;
          ?>
      </body>
  </html>
  <?php
} else {
  echo "Error: ". $sql. "<br>". $conn->error;
}

$conn->close();
?>