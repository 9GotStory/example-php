<?php
session_start();

$host = 'localhost';
$dbname = 'example';
$username = 'root';
$password = '';

$dsn = "mysql:host=$host;dbname=$dbname";

try {
  $pdo = new PDO($dsn, $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}
