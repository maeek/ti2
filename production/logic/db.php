<?php

include_once('./config/config.php');

function get_menu_items()
{
  if ($connect_to_db->errno != 0) {
    return [];
  }

  $sql = "SELECT * FROM POTRAWY";
  $result = $connect_to_db->query($sql);
  while ($row = $result->fetch_assoc()) {
    $menu_items[] = $row;
  }

  return $menu_items;
}
