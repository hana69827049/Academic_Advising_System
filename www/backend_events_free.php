<?php
require_once '_db.php';

$json = file_get_contents('php://input');
$params = json_decode($json);

$session_id = session_id();

$stmt = $db->prepare("SELECT * FROM appointment JOIN doctor ON appointment.doctor_id = doctor.doctor_id WHERE (appointment_status = 'free' OR (appointment_status <> 'free' AND appointment_patient_session = :session)) AND NOT ((appointment_end <= :start) OR (appointment_start >= :end))");
$stmt->bindParam(':start', $params->start);
$stmt->bindParam(':end', $params->end);
$stmt->bindParam(":session", $session_id);
$stmt->execute();
$result = $stmt->fetchAll();

class Event {}
class Tags {}
$events = array();

foreach($result as $row) {
  $e = new Event();
  $e->id = $row['appointment_id'];
  $e->text = "";
  $e->start = $row['appointment_start'];
  $e->end = $row['appointment_end'];
  $e->tags = new Tags();
  $e->tags->status = $row['appointment_status'];
  $e->tags->doctor = $row['doctor_name'];
  $events[] = $e;
}

header('Content-Type: application/json');
echo json_encode($events);

?>
