<?php
class ConnectDB
{
  private $connDB;

  private $host = "82.25.121.181";
  private $username = "u231198616_dti268";
  private $password = "Dti028074500";
  private $dbname = "u231198616_dti268_db";

  public function getConnectDB()
  {
    // กำหนดการเชื่อมต่อกับฐานข้อมูล
    $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=utf8mb4";

    try {
      // สร้างการเชื่อมต่อฐานข้อมูล
      $this->connDB = new PDO($dsn, $this->username, $this->password);
      $this->connDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $this->connDB;
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
    // คืนค่าการเชื่อต่อฐานข้อมูล
    return $this->connDB;
  }
}
