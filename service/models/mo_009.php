 <?php
  class MO_009
  {
    private $connDB;

    // ตัวแปรที่ล้อกับข้อมูลในฐานข้อมูล
    public $id;
    public $taskName;
    public $taskDetail;

    public $msg;

    public function __construct($connDB)
    {
      $this->connDB = $connDB;
    }

    public function getAllTask()
    {
      // คำสั่ง SQL
      $sql = "SELECT * FROM mo_009_tb ORDER BY createAt DESC";
      // เตรียมคำสั่ง SQL เพื่อพร้อมใช้งาน
      $stmt = $this->connDB->prepare($sql);

      // รันคำสั่ง SQL
      $stmt->execute();

      // ส่งคืนข้อมูลที่ได้จากการทำงานของคำสั่ง SQL ไปใช้งานตามต้องการ
      return $stmt;
    }

    public function getTaskByTaskName($taskName)
    {
      // คำสั่ง SQL  
      $sql = "SELECT * FROM mo_009_tb WHERE taskName = :taskName ORDER BY createAt DESC";
      // คลีนข้อมูลที่ใช้เป็นเงื่อนไขที่รันเข้ามา
      $taskName = htmlspecialchars(strip_tags($taskName));
      // เตรียมคำสั่ง SQL เพื่อพร้อมใช้งาน
      $stmt = $this->connDB->prepare($sql);
      // กำหนดค่าข้อมูลให้กับ sql parameter
      $stmt->bindParam(":taskName", $taskName);
      // รันคำสั่ง SQL
      $stmt->execute();

      // ส่งคืนข้อมูลที่ได้จากการทำงานของคำสั่ง SQL ไปใช้งานตามต้องการ
      return $stmt;
    }
    public function getTaskByTaskDetailAndTaskStatus($taskDetail)
    {
      // คำสั่ง SQL  
      $sql = "SELECT * FROM mo_009_tb WHERE taskDetail LIKE :taskDetail AND taskStatus = 1 ORDER BY createAt DESC";
      // คลีนข้อมูลที่ใช้เป็นเงื่อนไขที่รันเข้ามา
      $taskDetail = htmlspecialchars(strip_tags($taskDetail));
      // เตรียมคำสั่ง SQL เพื่อพร้อมใช้งาน
      $stmt = $this->connDB->prepare($sql);
      // กำหนดค่าข้อมูลให้กับ sql parameter
      $search = "%" . $taskDetail . "%";
      $stmt->bindParam(":taskDetail", $search);
      // รันคำสั่ง SQL
      $stmt->execute();

      // ส่งคืนข้อมูลที่ได้จากการทำงานของคำสั่ง SQL ไปใช้งานตามต้องการ
      return $stmt;
    }

    public function addTask($taskName, $taskDetail, $taskStatus)
    {
      $sql = "INSERT INTO mo_009_tb (taskName, taskDetail, taskStatus) VALUES (:taskName, :taskDetail, :taskStatus)";

      // คลีนข้อมูลที่ใช้เป็นเงื่อนไขที่รันเข้ามา
      $taskName = htmlspecialchars(strip_tags($taskName));
      $taskDetail = htmlspecialchars(strip_tags($taskDetail));
      $taskStatus = intval(htmlspecialchars(strip_tags($taskStatus)));
      // เตรียมคำสั่ง SQL เพื่อพร้อมใช้งาน
      $stmt = $this->connDB->prepare($sql);
      // กำหนดค่าข้อมูลให้กับ sql parameter
      $stmt->bindParam(":taskName", $taskName);
      $stmt->bindParam(":taskDetail", $taskDetail);
      $stmt->bindParam(":taskStatus", $taskStatus);

      // รันคำสั่ง SQL และส่งค่าสำเร็จ (true) หรือ ไม่สำเร็จ (false)
      if ($stmt->execute()) {
        return true;
      } else {
        return false;
      };

      // ส่งคืนข้อมูลที่ได้จากการทำงานของคำสั่ง SQL ไปใช้งานตามต้องการ
      return $stmt;
    }

    public function updateTaskByID($id, $taskName, $taskDetail, $taskStatus)
    {
      $sql = "UPDATE mo_009_tb SET taskName = :taskName, taskDetail = :taskDetail, taskStatus = :taskStatus WHERE id = :id";

      // คลีนข้อมูลที่ใช้เป็นเงื่อนไขที่รันเข้ามา
      $id =  intval(htmlspecialchars(strip_tags($id)));
      $taskName = htmlspecialchars(strip_tags($taskName));
      $taskDetail = htmlspecialchars(strip_tags($taskDetail));
      $taskStatus = intval(htmlspecialchars(strip_tags($taskStatus)));

      // เตรียมคำสั่ง SQL เพื่อพร้อมใช้งาน
      $stmt = $this->connDB->prepare($sql);
      // กำหนดค่าข้อมูลให้กับ sql parameter
      $stmt->bindParam(":id", $id);
      $stmt->bindParam(":taskName", $taskName);
      $stmt->bindParam(":taskDetail", $taskDetail);
      $stmt->bindParam(":taskStatus", $taskStatus);


      // รันคำสั่ง SQL และส่งค่าสำเร็จ (true) หรือ ไม่สำเร็จ (false)
      if ($stmt->execute()) {
        return true;
      } else {
        return false;
      };

      // ส่งคืนข้อมูลที่ได้จากการทำงานของคำสั่ง SQL ไปใช้งานตามต้องการ
      return $stmt;
    }

    public function deleteTaskByID($id)
    {
      $sql = "DELETE FROM mo_009_tb WHERE id =:id";
      $id =  intval(htmlspecialchars(strip_tags($id)));

      // เตรียมคำสั่ง SQL เพื่อพร้อมใช้งาน
      $stmt = $this->connDB->prepare($sql);
      // กำหนดค่าข้อมูลให้กับ sql parameter
      $stmt->bindParam(":id", $id);


      // รันคำสั่ง SQL และส่งค่าสำเร็จ (true) หรือ ไม่สำเร็จ (false)
      if ($stmt->execute()) {
        return true;
      } else {
        return false;
      };

      // ส่งคืนข้อมูลที่ได้จากการทำงานของคำสั่ง SQL ไปใช้งานตามต้องการ
      return $stmt;
    }
  }
