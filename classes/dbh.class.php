<?php

require_once $_SERVER['DOCUMENT_ROOT']. ('/oop_pdo_crud/vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__. '/../');
$dotenv->load();

class Dbh {

    private $host = "localhost";
    private $user= "root";
    private $pwd = "";
    private $dbName= "oopblog";


    /*
    private $host = $_ENV["HOST"];
    private $user= $_ENV["DB_USER"];
    private $pwd = $_ENV["DB_PASSWORD"];
    private $dbName= $_ENV["DB"];

    public function __construct($host,$user,$pwd,$dbName){

      $this->host = $host;
      $this->user = $user;
      $this->pwd = $pwd;
      $this->dbName = $dbName;
    }
  */
    public function connect() {
        try{

          $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
          $conn = new PDO($dsn, $this->user, $this->pwd);
          $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
          return $conn;

        } catch(PDOException $e) {
          echo 'Connection Error: ' . $e->getMessage();
        }
    }

  }