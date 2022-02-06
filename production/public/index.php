<?php

session_start([
  'cookie_lifetime' => 86400
]);

require_once '../api/auth.php';
require_once '../api/orders.php';
require_once '../api/menu.php';

header('Location: index.html');
