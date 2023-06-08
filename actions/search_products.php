<?php

include("../connect/connect.php");

// Get search input
$search = $_GET["search"];

// Prepare the statement with parameter binding
$query = "SELECT * FROM products WHERE LOWER(name) LIKE CONCAT('%', ?, '%')";
$stmt = mysqli_prepare($link, $query);
mysqli_stmt_bind_param($stmt, "s", $search);
mysqli_stmt_execute($stmt);

// Get the result set
$result = mysqli_stmt_get_result($stmt);

// Fetch products
$products = array();
while ($row = mysqli_fetch_assoc($result)) {
  $products[] = $row;
}

// Return products as JSON
header("Content-type: application/json");
echo json_encode($products);
