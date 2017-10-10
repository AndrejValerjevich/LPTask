<?php

require_once 'script/php/connection.php';

$sql = "SELECT * FROM projects ORDER BY project_name ASC";
$statement = $pdo->prepare($sql);
$statement->execute();

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
	<title>LPTask</title>
	<link rel="stylesheet"  href="style/style.css">
    <link rel="shortcut icon" href="src/image/task.ico" type="image/x-icon">
    <script type="text/javascript" src="script/js/jquery-3.2.1.js"></script>
    <script type="text/javascript">
        function adddata() {
            $.ajax({
                type: 'POST',
                url: "script/php/addProject.php",
                async: true,
                data: { name: $('#name').val(), key: $('#key').val()  },
                success: function(data){
                    alert( "Данные: " + data + "в базе:)");
                }
            })}
    </script>
</head>
<body>
<header class="navigation clearfix">
	<ul class="navigation__ul">
		<li class="navigation__ul__item"><a class="navigation__ul__item__link_active" href="">Проекты</a></li>
		<li class="navigation__ul__item"><a class="navigation__ul__item__link" href="tasks.php">Задачи</a></li>
	</ul>
</header>
<section class="container-projects">
    <h1 class="container-projects__header">Проекты</h1>
	<table class="projects-table">
        <?php foreach ($statement as $value) {?>
		<tr class="projects-table__row">
			<td class="projects-table__project-name"><a href="tasks.php?project_id=<?= $value['id']; ?>"><?=  $value['project_name']; ?></a></td>
			<td class="projects-table__project-key"><?= $value['project_key']; ?></td>
			<td class="projects-table__project-tasks-link"><a class="projects-table__project-tasks-link__link" href="/">Задачи</a></td>
		</tr>
        <?php } ?>
	</table>
	<input type="button" value="+ добавить" class="btn" onclick="show('block')">

	<p>Сегодняшняя дата:

       <?php

       echo date("Y-m-d H:i");

?> 
</section>

<div onclick="show('none')" class="wrap-window"></div>


	<div class="popup">
	<h3 class="popup__header">Новый проект</h3>
	<img class="popup__close-button_close" onclick="show('none')" src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Saint_Andrew's_cross_black.svg" width="15" height="15">
	<div class="popup__content">
		<label class="popup__content__label-text">Название</label>
	    <input class="popup__content__input-window" id="name" type="text" name="name">
		<label class="popup__content__label-text">Ключ</label>
	    <input class="popup__content__input-window" id="key" type="text" name="key">
        <input type="submit" value="Создать" class="btn popup-window" onclick="adddata();">
	</div>

</div>

<script src="script/js/popup.js"></script>
</body>
</html>