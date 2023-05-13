<?php

$host = "localhost";
$db = "social";
$user = "root";
$password = "";

$conn = new PDO("mysql:dbname=$db;host=$host", $user, $password);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);