<?php
require_once '_db.php';

class Result {}

$session = session_id();

$stmt = $db->prepare("UPDATE appointment SET appointment_patient_name = :name, appointment_patient_session = :session, appointment_status = 'waiting' WHERE appointment_id = :id");
$stmt->bindParam(':id', $_POST["id"]);
$stmt->bindParam(':name', $_POST["name"]);
$stmt->bindParam(':session', $session);
$stmt->execute();

$response = new Result();
$response->result = 'OK';
$response->message = 'Update successful';

header('Content-Type: application/json');
echo json_encode($response);

?>
