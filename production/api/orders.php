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
  global $connect_to_db;
  $basket = $_SESSION['basket'] ?? [];

  $sql = "SELECT * FROM DISHES";

  $result = $connect_to_db->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $basket[$row['ID']] = [
        'name' => $row['NAME'],
        'price' => $row['PRICE'],
        'quantity' => array_key_exists($row['ID'], $basket) ? $basket[$row['ID']] : 0
      ];
    }
  }

  return $basket;
}

function postOrder($id, $data)
{
  global $connect_to_db;

  $id = mysqli_real_escape_string($connect_to_db, $id);
  $data = mysqli_real_escape_string($connect_to_db, json_encode($data));

  $sql = "INSERT INTO ORDERS (USER_ID, ORDER_DATE, STATUS, DETAILS) VALUES ('$id', NOW(), 'pending', '$data')";
  $result = $connect_to_db->query($sql);

  if ($result) {
    $_SESSION['basket'] = [];
    return true;
  }

  return false;
}

function getOrders()
{
  global $connect_to_db;

  $id = $_SESSION['id'];

  $sql = "SELECT * FROM ORDERS WHERE ID = '$id'";
  $orders = [];

  $result = $connect_to_db->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $orders[$row['ID']] = [
        'id' => $row['ID'],
        'userId' => $row['USER_ID'],
        'date' => $row['ORDER_DATE'],
        'status' => $row['STATUS'],
        'details' => json_decode($row['DETAILS'])
      ];
    }
  }

  return $orders;
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
} else if (isset($_GET['orders']) && $_SERVER['REQUEST_METHOD'] === 'GET') {
  echo json_encode(getOrders());
  die;
} else if (isset($_GET['order']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = json_decode(file_get_contents('php://input'), true);

  echo json_encode(postOrder($_SESSION['id'], $data['ids']));
  die;
}
