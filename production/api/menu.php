<?php

function getMenu()
{
  global $connect_to_db;

  $sql = "SELECT * FROM DISHES";
  $menu = [];

  $result = $connect_to_db->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $menu[$row['ID']] = [
        'id' => $row['ID'],
        'name' => $row['NAME'],
        'price' => $row['PRICE'],
        'description' => $row['DESCRIPTION']
      ];
    }
  }

  return $menu;
}

if (isset($_GET['menu']) && $_SERVER['REQUEST_METHOD'] === 'GET') {
  echo json_encode(getMenu());
  die;
}
