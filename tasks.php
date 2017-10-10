<?php

require_once 'script/php/connection.php';


$sql = "SELECT * FROM tasks";
$statement = $pdo->prepare($sql);
$statement->execute();

if (isset($_GET['project_id'])) {
    $project_id = $_GET['project_id'];
    $project_name = 'Проект '.$project_id;
    $project_href = "?project_id=$project_id";/*Работа со ссылкой на проекты в заголовке*/

    $sql = "SELECT * FROM tasks WHERE project_id='$project_id'";
    $statement = $pdo->prepare($sql);
    $statement->execute();/*Показываем только список задач, принадлежащих выбранному проекту*/
} else {
    $project_name = 'Все проекты';
    $project_href = 'index.php';
}




?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
	<title>LPTask</title>
	<link rel="stylesheet"  href="style/style.css">
    <link rel="shortcut icon" href="src/image/task.ico" type="image/x-icon">
</head>
<body>
<header class="navigation clearfix">
	<ul class="navigation__ul">
		<li class="navigation__ul__item"><a class="navigation__ul__item__link" href="index.html">Проекты</a></li>
		<li class="navigation__ul__item"><a class="navigation__ul__item__link_active" href="">Задачи</a></li>
	</ul>
</header>
<section class="container-tasks">
    <h1 class="container-tasks__header">Задачи</h1>
    <p class="container-tasks__text" ">в проекте <a href="<?= $project_href; ?>"><?= $project_name; ?></a></p>
	<table class="tasks-table">
        <?php foreach ($statement as $value) {
            if ($value['status'] == 0) {
                $class = 'tasks-table__task-status_new';
                $status = 'New';
            } elseif ($value['status'] == 1) {
                $class = 'tasks-table__task-status_working';
                $status = 'Working';
            } else {
                $class = 'tasks-table__task-status_done';
                $status = 'Done';
            }
            ?>
		<tr class="tasks-table__row">
			<td class="tasks-table__task-move"><div class="tasks-table__task-move__button"><hr><hr><hr></div></td>
            <td class="tasks-table__task-id"><a href="/"><?= $value['gen_id']; ?></a></td>
			<td class="tasks-table__task-status"><div class="<?= $class; ?>"><?= $status; ?></div></a></td>
			<td class="tasks-table__task-name"><?= $value['name']; ?></td>
			<td class="tasks-table__task-description"><?= $value['text']; ?></td>
			<td class="tasks-table__task-details"><a class="tasks-table__task-details__link" href="/">подробнее</a></td>
		</tr>
        <?php } ?>
	</table>
	<input type="button" value="+ добавить" class="btn" onclick="show('block')">
</section>

<div onclick="show('none')" class="wrap-window"></div>

<form>
	<div class="popup tasks-popup">
    <h3 class="popup__header">Новый проект</h3>
	<img class="popup__close-button_close" onclick="show('none')" src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Saint_Andrew's_cross_black.svg" width="15" height="15">
		<label class="popup__content__label-text">Название</label>
	    <input class="popup__content__input-window" type="text" name="name">
	    <label class="popup__content__label-text">Статус</label>
		<select class="popup__content__select-window">
			<option>новая</option>
		</select>
	    <label class="popup__content__label-text">Тип</label>
		<select class="popup__content__select-window">
			<option>улучшение</option>
		</select>
		<label class="popup__content__label-text">Описание</label>
	    <input class="popup__content__input-window wide-input-window" type="text" name="key">
		<input type="button" value="Создать" class="btn popup-window">
</div>
</form>
<script src="script/js/popup.js"></script>
</body>
</html>