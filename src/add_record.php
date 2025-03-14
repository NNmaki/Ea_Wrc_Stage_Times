

<?php
require_once "dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $table = $_POST["table"];
    $driver = $_POST["driver"];
    $class = $_POST["class"];
    $car = $_POST["car"];
    $minutes = $_POST["minutes"];
    $seconds = $_POST["seconds"];
    $milliseconds = $_POST["milliseconds"];
    $time = "{$minutes}'{$seconds}\"{$milliseconds}";

    $query = "INSERT INTO $table (driver, class, car, time) VALUES (:driver, :class, :car, :time)";
    $stmt = $pdo->prepare($query);
    
    if ($stmt->execute([
        ':driver' => $driver,
        ':class' => $class,
        ':car' => $car,
        ':time' => $time
    ])) {
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
        header("Location: " . $referer . "?success=1");
        exit;
    } else {
          echo "Error saving data.";
      }
  }


