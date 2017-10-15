//Функция обновления данных на странице index.html
function loadProjects(){
    $.ajax({
        type: 'post',
        url: "script/php/select.php",
        data: {table: "projects"},
        dataType: 'json',
        success: function(data){
            var rowid = " ";//Динамически изменяемые id
            var nameid = " ";//элементов, отрисовывемых
            var linkid = " ";//на странице

            $('#table').empty();//Удаление имеющихся элементов в таблице #table, чтобы избежать дублирования таблицы

            for (var n in data) {
                var rowdiv = document.createElement('div');
                rowid = "row" + n;
                rowdiv.className = "projects-table__row";
                rowdiv.id = rowid;

                table.appendChild(rowdiv);

                var cell1 = document.createElement('div');
                nameid = "name" +n;
                cell1.className = "projects-table__project-name";
                cell1.id = nameid;

                var nameLink = document.createElement('a');
                nameLink.innerHTML = data[n].project_name;
                nameLink.href = "tasks.html?project_id=" + data[n].id + "&project_name=" + data[n].project_name;


                var cell2 = document.createElement('div');
                cell2.className = "projects-table__project-key";
                cell2.innerHTML = data[n].project_key;


                var cell3 = document.createElement('div');
                linkid = "link" + n;
                cell3.className = "projects-table__project-tasks-link";
                cell3.id = linkid;

                var tasksLink = document.createElement('a');
                tasksLink.className = "projects-table__project-tasks-link__link";
                tasksLink.innerHTML = "Задачи";
                tasksLink.href = "tasks.html?project_id=" + data[n].id + "&project_name=" + data[n].project_name;


                var row = document.getElementById(rowid);
                row.appendChild(cell1);
                row.appendChild(cell2);
                row.appendChild(cell3);

                var name = document.getElementById(nameid);
                name.appendChild(nameLink);

                var link = document.getElementById(linkid);
                link.appendChild(tasksLink);
            }//Отрисовка HTML и заполнение ячеек
        }
    });
}