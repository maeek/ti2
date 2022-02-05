<?php

function addToBasket($productId, $quantity)
{
  $currentBasket = $_SESSION['basket'] ?? [];

  if (isset($currentBasket[$productId])) {
    $currentBasket[$productId] += $quantity;
  } else {
    $currentBasket[$productId] = $quantity;
  }

  $_SESSION['basket'] = $currentBasket;

  return $currentBasket;
}

function removeFromBasket($productId)
{
  $currentBasket = $_SESSION['basket'] ?? [];

  if (isset($currentBasket[$productId])) {
    unset($currentBasket[$productId]);
  }

  $_SESSION['basket'] = $currentBasket;

  return $currentBasket;
}

function getBasket()
{
  return $_SESSION['basket'] ?? [];
}


if (isset($_GET['basket']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = json_decode(file_get_contents('php://input'), true);

  addToBasket($data['productId'], $data['quantity']);
  die;
} else if (isset($_GET['basket']) && $_SERVER['REQUEST_METHOD'] === 'DELETE') {
  $data = json_decode(file_get_contents('php://input'), true);

  removeFromBasket($data['productId']);
  die;
} else if (isset($_GET['basket']) && $_SERVER['REQUEST_METHOD'] === 'GET') {
  echo json_encode(getBasket());
  die;
}
