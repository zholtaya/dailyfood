<?php

$link = mysqli_connect("localhost", "root", "root", "dailyfood");

if (!$link) {
    die("Error with connect to DB");
}