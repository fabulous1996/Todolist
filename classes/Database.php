<?php

class Database
{
  private $DB;
  private $config;

  public function __construct()
  {
    $this->config = __DIR__ . '/../config.php';
    require_once $this->config;

    try {
      $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
      $this->DB = new PDO($dsn, DB_USER, DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (PDOException $error) {
      die('Erreur : ' . $error->getMessage());
    }
  }

  /**
   * Retourne la connexion BDD établie et l'objet PDO associé.
   */
  public function getDB(): PDO
  {
    return $this->DB;
  }
}