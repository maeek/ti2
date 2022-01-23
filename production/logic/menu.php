<?php

require_once('./config/config.php');

function get_menu()
{
  $menu_items = [];

  if ($connect_to_db->errno != 0) {
    return $menu_items;
  }

  $sql = "SELECT * FROM POTRAWY";
  $result = $connect_to_db->query($sql);
  while ($row = $result->fetch_assoc()) {
    $menu_items[] = $row;
  }

  return $menu_items;
}

function get_menu_item($id)
{
  $menu_item = [];

  if ($connect_to_db->errno != 0) {
    return $menu_item;
  }

  $sql = "SELECT * FROM POTRAWY WHERE ID = $id";
  $result = $connect_to_db->query($sql);
  while ($row = $result->fetch_assoc()) {
    $menu_item[] = $row;
  }

  return $menu_item;
}
