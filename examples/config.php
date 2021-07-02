<?php
$servername = "localhost";
$username = "root";
$password = "";
$database="black_wing";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);
$customer_dir = dirname("http://localhost/learts2/images/");
$vendor_dir = dirname("http://localhost/material-dashboard-master/examples/img");
$admin_dir_name = dirname("http://localhost/black-wing-master/img");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>