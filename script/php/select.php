<?php

require_once 'connection.php';

if (isset($_POST['table']) && $_POST['table'] != 'tasks') {//Запрос на общий селект из выбранной таблицы, кроме tasks
    $table = $_POST['table'];
    $sql = "SELECT * FROM $table ORDER BY id ASC";
    $statement = $pdo->prepare($sql);
    $statement->execute();
} elseif ($_POST['table'] == 'tasks') {//Запрос на селект из таблицы tasks, если параметров нет
    $sql = "SELECT tasks.id AS TaskId, tasks.gen_id AS GenId, statuses.name AS Status, tasks.name AS Name, tasks.text AS Text 
            FROM tasks, statuses 
            WHERE tasks.status=statuses.id 
            ORDER BY TaskId ASC";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    if (isset($_POST['project_id'])) {//Запрос на селект из таблицы tasks, по принадлежности к заданному Проекту
        $project_id = $_POST['project_id'];
        $sql = "SELECT tasks.id AS TaskId, tasks.gen_id AS GenId, statuses.name AS Status, tasks.name AS Name, tasks.text AS Text 
                FROM tasks, statuses 
                WHERE tasks.status=statuses.id AND project_id = ?
                ORDER BY TaskId ASC";
        $statement = $pdo->prepare($sql);
        $statement->execute(["{$project_id}"]);
    }
    if (isset($_POST['task_id'])) {//Запрос на селект из таблицы tasks, когда нужно заполнить форму editTask для изменения записи
        $task_id = $_POST['task_id'];
        $sql = "SELECT tasks.id AS TaskId, projects.id AS ProjectId, statuses.id AS StatusId, tasks.name AS Name, types.id AS TypeId, tasks.text AS Text 
                FROM tasks, statuses, projects, types 
                WHERE tasks.status=statuses.id AND projects.id=tasks.project_id AND tasks.type=types.id AND tasks.id = ?
                ORDER BY TaskId ASC";
        $statement = $pdo->prepare($sql);
        $statement->execute(["{$task_id}"]);
    }
} else {
    $statement = '';
}

$mass = [];
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $mass[] = $row;
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($mass);

?>