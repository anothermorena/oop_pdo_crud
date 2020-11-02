<?php

require './vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__. '/../');
$dotenv->load();

class Dbh {

    public function connect() {
        try{

          $dsn = 'mysql:host=' . $_ENV["HOST"] . ';dbname=' . $_ENV["DB"];
          $conn = new PDO($dsn, $_ENV["DB_USER"], $_ENV["DB_PASSWORD"]);
          $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
          return $conn;

        } catch(PDOException $e) {
          echo 'Connection Error: ' . $e->getMessage();
        }
    }

  }