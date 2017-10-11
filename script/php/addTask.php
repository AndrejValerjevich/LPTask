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
    $project_id = (string)$_POST['project_id'];
    $status = (string)$_POST['status'];
    if ($status == "New"){
        $status = 0;
    }elseif ($status == "Working"){
        $status = 1;
    } else {
        $status = 2;
    }
    $type = (string)$_POST['type'];
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