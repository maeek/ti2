<?php

if (isset($_GET)) {
  header('Location: /');
}

require_once('../config.php');

function get_checkout()
{
  return json_decode($_COOKIE['checkout']) || [];
}

function set_checkout($checkout)
{
  setcookie('checkout', json_encode($checkout), time() + (60 * 60), "/", "", false, true);
}

function reset_checkout()
{
  setcookie('checkout', '', time() - 3600, "/", "", false, true);
}
