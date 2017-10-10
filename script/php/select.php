<?php

require_once 'connection.php';

$sql = "SELECT * FROM projects ORDER BY project_name ASC";
$statement = $pdo->prepare($sql);
$statement->execute();

$mass = [];
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $mass[] = $row;
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($mass);

?>