<?php
session_start();
include("../connect/connect.php");

$productId = $_GET["product_id"];
$type = $_GET["type"];
$uniqueId = uniqid();
$userId = $_SESSION["uid"];

$checkCartIsCreatedSQL = "SELECT * FROM cart WHERE userId = '$userId'";
$checkCartResponse = $link->query($checkCartIsCreatedSQL);
$maybeCart = $checkCartResponse->fetch_assoc();

if (!$maybeCart) {
  $createNewCartRowSQL = "INSERT INTO cart (userId, uniqueId) VALUES ('$userId', '$uniqueId')";
  $link->query($createNewCartRowSQL);

  $getThisCartRowSQL = "SELECT * FROM cart WHERE userId = '$userId' AND uniqueId = '$uniqueId'";
  $thisCartRowResponse = $link->query($getThisCartRowSQL);
  $maybeCart = $thisCartRowResponse->fetch_assoc();
}

if ($type == "new") {
  $addProductIntoCartListSQL = "INSERT INTO cart_list (cartId, productId, count) VALUES ('{$maybeCart['id']}', '$productId', 1)";
  $link->query($addProductIntoCartListSQL);
} else if ($type == "increment") {
  $incrementSQL = "UPDATE cart_list SET count = count + 1 WHERE cartId = '{$maybeCart['id']}' AND productId = '$productId'";
  $link->query($incrementSQL);
} else if ($type == "decrement") {
  $decrementSQL = "UPDATE cart_list SET count = count - 1 WHERE cartId = '{$maybeCart['id']}' AND productId = '$productId'";
  $link->query($decrementSQL);
}
