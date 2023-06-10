<?php

$link = mysqli_connect("localhost", "root", "root", "dailyfood");
// $link = mysqli_connect("localhost", "z364", "rvuks`y2Ujfa", "z364");

if (!$link) {
  die("Error with connect to DB");
}
