<?php

require_once '../api/config.php';

function checkDbConnection()
{
  global $connect_to_db;
  if ($connect_to_db->connect_error) {
    return false;
  }

  return true;
}

function getUser($username)
{
  global $connect_to_db;
  $username = mysqli_real_escape_string($connect_to_db, $username);
  $query = "SELECT * FROM USERS WHERE USERNAME = '$username'";
  $result = $connect_to_db->query($query);
  if ($result->num_rows > 0) {
    return $result->fetch_assoc();
  }

  return false;
}

function register($username, $password, $name, $email, $address)
{
  global $connect_to_db;

  if (getUser($username)) {
    echo json_encode(['success' => false]);
    return;
  }

  $username = mysqli_real_escape_string($connect_to_db, $username);
  $password = mysqli_real_escape_string($connect_to_db, $password);
  $name = mysqli_real_escape_string($connect_to_db, $name);
  $email = mysqli_real_escape_string($connect_to_db, $email);
  $address = mysqli_real_escape_string($connect_to_db, $address);
  $sql = "INSERT INTO USERS (USERNAME, PASSWORD, NAME, EMAIL, ADDRESS) VALUES ('$username', '$password', '$name', '$email', '$address')";
  $result = $connect_to_db->query($sql);

  if ($result) {
    login($username, $password);
    return;
  }

  echo json_encode(['success' => false]);
}

function login($username, $password)
{
  global $connect_to_db;

  if (!checkDbConnection()) {
    echo json_encode(['success' => false]);
    return;
  }

  $username = mysqli_real_escape_string($connect_to_db, $username);
  $password = mysqli_real_escape_string($connect_to_db, $password);
  $sql = "SELECT * FROM USERS WHERE USERNAME = '$username' AND PASSWORD = '$password'";

  $result = $connect_to_db->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $_SESSION['username'] = $row['USERNAME'];
      $_SESSION['id'] = $row['ID'];
    }

    setcookie('username', $username, time() + 86400);

    echo json_encode(['success' => true]);
    return;
  }

  echo json_encode(['success' => false]);
}

function logout()
{
  setcookie('username', '', time() - 86400);
  session_destroy();
  echo json_encode(['success' => true]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = json_decode(file_get_contents('php://input'), true);

  if (isset($_GET['register'])) {
    register($data['username'], $data['password'], $data['name'], $data['email'], $data['address']);
    die;
  } else if (isset($_GET['login'])) {
    login($data['username'], $data['password']);
    die;
  } else if (isset($_GET['logout'])) {
    logout();
    die;
  }
}
