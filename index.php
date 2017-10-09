<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
	<title></title>
	<link rel="stylesheet"  href="style.css">
</head>
<body>
<header class="navigation clearfix">
	<ul class="navigation__ul">
		<li class="navigation__ul__item"><a class="navigation__ul__item__link_active" href="">Проекты</a></li>
		<li class="navigation__ul__item"><a class="navigation__ul__item__link" href="tasks.html">Задачи</a></li>
	</ul>
</header>
<section class="container-projects">
    <h1 class="container-projects__header">Проекты</h1>
	<table class="projects-table">
		<tr class="projects-table__row">
			<td class="projects-table__project-name"><a href="/">Проект 1</a></td>
			<td class="projects-table__project-key">PRG</td>
			<td class="projects-table__project-tasks-link"><a class="projects-table__project-tasks-link__link" href="/">Задачи</a></td>
		</tr>
		<tr class="projects-table__row">
			<td class="projects-table__project-name"><a href="/">Проект 2</a></td>
			<td class="projects-table__project-key">TST</td>
			<td class="projects-table__project-tasks-link"><a class="projects-table__project-tasks-link__link" href="/">Задачи</a></td>
		</tr>
	</table>
	<input type="button" value="+ добавить" class="btn" onclick="show('block')">
	<p>Сегодняшняя дата:

       <?php

       echo date("Y-m-d H:i");

?> 
</section>

<div onclick="show('none')" class="wrap-window"></div>

<form>
	<div class="popup">
	<h3 class="popup__header">Новый проект</h3>
	<img class="popup__close-button_close" onclick="show('none')" src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Saint_Andrew's_cross_black.svg" width="15" height="15">
	<div class="popup__content">
		<label class="popup__content__label-text">Название</label>
	    <input class="popup__content__input-window" type="text" name="name">
		<label class="popup__content__label-text">Ключ</label>
	    <input class="popup__content__input-window" type="text" name="key">
	</div>
	<input type="button" value="Создать" class="btn popup-window">
</div>
</form>
					
<script type="text/javascript">

					//Функция показа
			function show(state){
                    for (var i = 0; i < 1; i++) {
                    document.getElementsByClassName('popup')[i].style.display = state;			
					document.getElementsByClassName('wrap-window')[i].style.display = state; 	
                    }		
			}
			
		</script>

</body>
</html>