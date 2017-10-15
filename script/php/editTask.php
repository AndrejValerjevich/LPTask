<?php

require_once 'connection.php';
require_once 'generateId.php';

$gen_id = generateId($_POST['project_id'], $pdo);//Генерация идентификатора gen_id, состоящего из key проекта и его id


if (!empty($_POST['task_id'])&&!empty($_POST['project_id'])&&!empty($_POST['status'])&&!empty($_POST['type'])&&!empty($_POST['name'])&&!empty($_POST['text'])) {
    $task_id = $_POST['task_id'];
    $project_id = $_POST['project_id'];
    $status = $_POST['status'];
    $type = $_POST['type'];
    $name = (string)$_POST['name'];
    $text = (string)$_POST['text'];

    $sql = "UPDATE tasks 
            SET project_id = ?, gen_id = ?, status = ?, type = ?, name = ?, text = ? 
            WHERE tasks.id = ?";
    $statement = $pdo->prepare($sql);
    $statement->execute(["{$project_id}", "{$gen_id}", "{$status}", "{$type}", "{$name}", "{$text}", "{$task_id}"]);
    echo "Все удалось!";
} else {
    echo "Данные не пришли.";
}//Изменение записи в таблице tasks

?>
