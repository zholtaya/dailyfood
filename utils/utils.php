<?php

function checkEmptyLines($lines)
{
  foreach ($lines as $line) {
    if (empty(trim($line))) {
      return false;
    }
  }

  return true;
}

function checkUserByEmail($email)
{
  global $link;

  $checkUserSQL = "SELECT * FROM users WHERE email = '$email'";
  $userResponse = $link->query($checkUserSQL);
  $user = $userResponse->fetch_assoc();

  if ($user) {
    return $user;
  } else {
    return false;
  }
}

function validateEmail($email)
{
  $email = trim($email);

  if (empty($email)) {
    return false;
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return false;
  }

  return true;
}

function validatePassword($password)
{
  if (empty($password)) {
    return false;
  }

  $minLength = 8;
  if (strlen($password) < $minLength) {
    return false;
  }

  return true;
}

function redirect($route)
{
  echo "<script>document.location.href='?$route'</script>";
}
