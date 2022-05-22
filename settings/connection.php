<?php
    if (file_exists(__DIR__ . '/../' . '/vendor/' . 'autoload.php')) {
        require_once(__DIR__ . '/../' . '/vendor/' . 'autoload.php');
    }
    // Looing for .env at the root directory
    if (file_exists(__DIR__ . '/../.env')) {
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
        $dotenv->load();
    }

    $database = $_ENV['DATABASE_HOST'];
    $database_name = $_ENV['DATABASE_NAME'];
    $username = $_ENV['DATABASE_USERNAME'];
    $password = $_ENV['DATABASE_PASSWORD'];

    $mysqli = mysqli_connect($database, $username, $password, $database_name);

    if (mysqli_connect_errno()) {
        echo "Failed to connect " . mysqli_connect_error();
        exit();
    }
?>