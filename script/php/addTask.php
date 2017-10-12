<?php

require_once 'connection.php';

$gen_id = "";
if (!empty($_POST['project_id'])) {
    $project_id = (string)$_POST['project_id'];
    $sql = "SELECT * FROM projects WHERE id=?";
    $statement = $pdo->prepare($sql);
    $statement->execute(["{$project_id}"]);

    foreach ($statement as $value) {
        $gen_id = $value['project_key']."-".$value['id'];
    }
}



#region //Добавление записи
if (!empty($_POST['project_id'])&&!empty($_POST['status'])&&!empty($_POST['type'])&&!empty($_POST['name'])&&!empty($_POST['text'])) {
    $project_id = $_POST['project_id'];
    $status = $_POST['status'];
    $type = $_POST['type'];
    $name = (string)$_POST['name'];
    $text = (string)$_POST['text'];

    $sql = "INSERT INTO tasks (id, project_id, gen_id, status, type, name, text) VALUES (NULL, ?, ?, ?, ?, ?, ?)";
    $statement = $pdo->prepare($sql);
    $statement->execute(["{$project_id}", "{$gen_id}", "{$status}", "{$type}", "{$name}", "{$text}"]);
    echo "Все удалось!";
} else {
    echo "Данные не пришли.";
}
#endregion

?>