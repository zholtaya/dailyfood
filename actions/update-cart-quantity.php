<?php
session_start();
include("../connect/connect.php");

$cartListId = $_GET["cart_list_id"];
$type = $_GET["type"];

$getCurrentRowSQL = "SELECT * FROM cart_list WHERE id = '$cartListId'";
$currentRowResponse = $link->query($getCurrentRowSQL);
$currentRow = $currentRowResponse->fetch_assoc();

if ($type == "increment") {
    $incrementSQL = "UPDATE cart_list SET count = count + 1 WHERE id = '$cartListId'";
    $link->query($incrementSQL);
} else if ($type == "decrement") {
    if ($currentRow["count"] == 1) {
        $decrementSQL = "DELETE FROM cart_list WHERE id = '$cartListId'";
    } else {
        $decrementSQL = "UPDATE cart_list SET count = count - 1 WHERE id = '$cartListId'";
    }

    $link->query($decrementSQL);
}
