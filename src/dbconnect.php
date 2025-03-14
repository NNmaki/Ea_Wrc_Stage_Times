<?php

$dbaddr = "mysql:host=localhost;dbname=_SUPERSECRET_";
$dbuser = "_SUPERSECRET_";
$dbpwd = "_SUPERSECRET_";

try {
    
    $pdo = new PDO($dbaddr, $dbuser, $dbpwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    echo "Yhteys epaonnistui: " . $error ->getMessage();
}

