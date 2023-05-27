<?php
include("../connect/connect.php");

$categoryID = $_POST['category_id'];
$query = "SELECT * FROM subcategories WHERE categoryId = '$categoryID'";
$result = $link->query($query);

$options = '';
while ($row = $result->fetch_assoc()) {
  $options .= '<option value="' . $row['id'] . '">' . $row['title'] . '</option>';
}

// Set the content type header to indicate that the response is HTML
header("Content-Type: text/html");

// Return the HTML options as response
echo $options;
