<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers:Content-Type");
header("Content-Type: application/json; charset=UTF-8");

// เรียกใช้ไฟล์ที่เกี่ยวข้อง
require_once "../connectDB.php";
require_once "../models/mo_009.php";

// สร้าง instance ของการติต่อฐานข้อมูล
$connDB = new ConnectDB();
$mo_009 = new MO_009($connDB->getConnectDB());

// ร้างตัวแปรที่รับข้อมูลมาจากการเรียกใช้ api
$data = json_decode(file_get_contents("php://input"));
$result = $mo_009->updateTaskByID($data->id, $data->taskName, $data->taskDetail, $data->taskStatus);
if ($result == true) {
  $dataInfo = array();
  $dataArray = array(
    "msgresult" => "1"
  );

  array_push($dataInfo, $dataArray);
  echo json_encode($dataInfo);
} else {
  $dataInfo = array();
  $dataArray = array(
    "msgresult" => "0"
  );

  array_push($dataInfo, $dataArray);
  echo json_encode($dataInfo);
}
