<?php

function generateId ($project_id, $pdo) {
    $gen_id = "";
    if (!empty($project_id)) {
        $project_id = (string)$_POST['project_id'];
        $sql = "SELECT * FROM projects WHERE id=?";
        $statement = $pdo->prepare($sql);
        $statement->execute(["{$project_id}"]);

        foreach ($statement as $value) {
            $gen_id = $value['project_key']."-".$value['id'];
        }
    }
    return $gen_id;
}//Функция генерации идектификатора task

?>