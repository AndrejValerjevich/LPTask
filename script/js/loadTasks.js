//Функция обновления данных на странице tasks.html
function loadTasks(project_id, project_name){
    $.ajax({
        type: 'post',
        url: "script/php/select.php",
        data: {table: "tasks", project_id: project_id},
        dataType: 'json',
        success: function(data){
            if (typeof (header) != "undefined") {
                $(header).remove();
            } if (typeof (headerText) != "undefined") {
                $(headerText).remove();
            }

            var h1 = document.createElement('h1');
            h1.className = "container-tasks__header";
            h1.id = "header";
            if (typeof (project_id) == "undefined" && typeof (project_name) == "undefined") {
                h1.innerHTML = "Все задачи";
                container.insertBefore(h1,table);
            } else {
                h1.innerHTML = "Задачи";
                container.insertBefore(h1,table);

                var p = document.createElement('p');
                p.className = "container-tasks__text";
                p.innerHTML = 'в проекте: <a href="">' + project_name + '</a>';
                p.id = "headerText";
                container.insertBefore(p,table);
            }

            var rowid = " ";//Динамически изменяемый id каждой строки в таблице
            var statusDivId = " ";
            var moveId = " ";
            var editId = " ";

            if (typeof (row0) != "undefined") {
                var rowamount = document.getElementsByClassName('tasks-table__row').length;
                for (var i = 0; i < rowamount; i++) {
                    rowid = "#row" + i;
                    $(rowid).remove();
                }//Удаление имеющихся элементов в таблице, если они есть - чтобы избежать дублирования таблицы
            }


            for (var n in data) {
                var rowdiv = document.createElement('div');
                rowid = "row" + n;
                rowdiv.className = "tasks-table__row";
                rowdiv.id = rowid;

                table.appendChild(rowdiv);

                var cell1 = document.createElement('div');
                moveId = "move" + n;
                cell1.className = "tasks-table__task-move";
                cell1.id = moveId;

                var cell1img = document.createElement('img');
                cell1img.className = "tasks-table__task-move__button";
                cell1img.src = "src/image/move.png";


                var cell2 = document.createElement('div');
                cell2.className = "tasks-table__task-genid  ";
                cell2.innerHTML = data[n].GenId;


                var cell3 = document.createElement('div');
                statusDivId = "status" + n;
                cell3.className = "tasks-table__task-status";
                cell3.id = statusDivId;

                var cell3div = document.createElement('div');

                var taskStatus = data[n].Status;
                if(taskStatus == "Новая"){
                    cell3div.className = "tasks-table__task-status_new";
                    cell3div.innerHTML = taskStatus;
                } else if(taskStatus == "В работе") {
                    cell3div.className = "tasks-table__task-status_working";
                    cell3div.innerHTML = taskStatus;
                } else if(taskStatus == "Выполнена") {
                    cell3div.className = "tasks-table__task-status_done";
                    cell3div.innerHTML = taskStatus;
                }


                var cell4 = document.createElement('div');
                cell4.className = "tasks-table__task-name";
                cell4.innerHTML = data[n].Name;

                var cell5 = document.createElement('div');
                cell5.className = "tasks-table__task-text";
                cell5.innerHTML = data[n].Text;

                var cell6 = document.createElement('div');
                editId = "edit" + n;
                cell6.className = "tasks-table__task-details";
                cell6.id = editId;

                var editLink = document.createElement('a');
                editLink.innerHTML = "подробнее...";
                editLink.className = "tasks-table__task-details__link";
                $(editLink).bind('click', function(){
                    show('editPopup','block');
                });

                var row = document.getElementById(rowid);
                row.appendChild(cell1);
                row.appendChild(cell2);
                row.appendChild(cell3);
                row.appendChild(cell4);
                row.appendChild(cell5);
                row.appendChild(cell6);

                var move = document.getElementById(moveId);
                move.appendChild(cell1img);

                var status = document.getElementById(statusDivId);
                status.appendChild(cell3div);

                var edit = document.getElementById(editId);
                edit.appendChild(editLink);
            }//Отрисовка HTML и заполнение ячеек
        }
    });
    $.ajax({
        type: 'post',
        url: "script/php/select.php",
        data: {table: "projects"},
        dataType: 'json',
        success: function(data) {
            for (var n in data) {
                var projectName = document.createElement('option');
                projectName.innerHTML = data[n].project_name;
                projectName.value = data[n].id;

                project.appendChild(projectName);

            }
        }
    });
    $.ajax({
        type: 'post',
        url: "script/php/select.php",
        data: {table: "statuses"},
        dataType: 'json',
        success: function(data) {
            for (var n in data) {
                var statusName = document.createElement('option');
                statusName.innerHTML = data[n].name;
                statusName.value = data[n].id;

                statuss.appendChild(statusName);

            }
        }
    });
    $.ajax({
        type: 'post',
        url: "script/php/select.php",
        data: {table: "types"},
        dataType: 'json',
        success: function(data) {
            for (var n in data) {
                var typeName = document.createElement('option');
                typeName.innerHTML = data[n].name;
                typeName.value = data[n].id;

                type.appendChild(typeName);

            }
        }
    });
}
