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
                    $('#resp').html(data);
                }
            });
            show('none');
        }
    </script>
    <script type="text/javascript">
        function loadDB(){
            $.ajax({
                url: "script/php/select.php",
                dataType: 'json',
                success: function(data){
                    var rowid = 0;
                    for (var n in data) {
                        var rowdiv = document.createElement('div');
                        rowid = "row" + n;
                        rowdiv.className = "projects-table__row";
                        rowdiv.id = rowid;

                        table.appendChild(rowdiv);

                        var cell1 = document.createElement('div');
                        cell1.className = "projects-table__project-name";
                        cell1.innerHTML = data[n].project_name;

                        var cell2 = document.createElement('div');
                        cell2.className = "projects-table__project-key";
                        cell2.innerHTML = data[n].project_key;

                        var cell3 = document.createElement('div');
                        cell3.className = "projects-table__project-tasks-link";
                        cell3.innerHTML = "Задачи";

                        rowid.appendChild(cell1);
                        rowid.appendChild(cell2);
                        rowid.appendChild(cell3);
                    }
                }
            });
        }
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
	<div class="projects-table" id="table">

	</div>
	<input type="button" value="+ добавить" class="btn" onclick="show('block')">

    <div id="resp">

    </div>

</section>

<input type="button" value="Загрузить БД" class="btn" onclick="loadDB();">

<div onclick="show('none')" class="wrap-window"></div>


	<div class="popup">
	<h3 class="popup__header">Новый проект</h3>
	<img class="popup__close-button_close" onclick="show('none')" src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Saint_Andrew's_cross_black.svg" width="15" height="15">
	<div class="popup__content">
		<label class="popup__content__label-text">Название</label>
	    <input class="popup__content__input-window" id="name" type="text" name="name">
		<label class="popup__content__label-text">Ключ</label>
	    <input class="popup__content__input-window" id="key" type="text" name="key">
        <input type="button" value="Создать" class="btn popup-window" onclick="adddata();">
	</div>

</div>

<script src="script/js/popup.js"></script>
</body>
</html>