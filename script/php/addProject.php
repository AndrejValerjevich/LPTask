<?php

require_once 'connection.php';

#region //Добавление записи
if (!empty($_POST['name'])&&!empty($_POST['key'])) {
    $name = (string)$_POST['name'];
    $key = (string)$_POST['key'];
    $sql = "INSERT INTO projects (id, project_name, project_key) VALUES (NULL, ?, ?)";
    $statement = $pdo->prepare($sql);
    $statement->execute(["{$name}", "{$key}"]);
    echo "Все удалось!";
} else {
    echo "Данные не пришли.";
}
#endregion

?>