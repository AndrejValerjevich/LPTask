<?php

require_once 'connection.php';

if (isset($_POST['table']) && $_POST['table'] != 'tasks') {
    $table = $_POST['table'];
    $sql = "SELECT * FROM $table ORDER BY id ASC";
} elseif ($_POST['table'] == 'tasks') {
    $sql = "SELECT tasks.id AS TaskId, tasks.gen_id AS GenId, statuses.name AS Status, tasks.name AS Name, tasks.text AS Text 
            FROM tasks, statuses 
            WHERE tasks.status=statuses.id 
            ORDER BY TaskId ASC";
    if (isset($_POST['project_id'])) {
        $project_id = $_POST['project_id'];
        $sql = "SELECT tasks.id AS TaskId, tasks.gen_id AS GenId, statuses.name AS Status, tasks.name AS Name, tasks.text AS Text 
                FROM tasks, statuses 
                WHERE tasks.status=statuses.id AND project_id=$project_id
                ORDER BY TaskId ASC";
    }
}

$statement = $pdo->prepare($sql);
$statement->execute();

$mass = [];
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $mass[] = $row;
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($mass);

?>