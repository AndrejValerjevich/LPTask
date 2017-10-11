//Функция обновления данных на странице tasks.html
function loadTasks(){
    $.ajax({
        type: 'post',
        url: "script/php/select.php",
        data: {page: "tasks"},
        dataType: 'json',
        success: function(data){
            var rowid = " ";//Динамически изменяемый id каждой строки в таблице
            var statusDivId = " ";
            var moveId = " ";
            var rowamount = document.getElementsByClassName('tasks-table__row').length;
            for (var i = 0; i < rowamount; i++) {
                rowid = "#row" + i;
                $(rowid).remove();
            }//Удаление имеющихся элементов в таблице, если они есть - чтобы избежать дублирования таблицы

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
                cell2.innerHTML = data[n].gen_id;


                var cell3 = document.createElement('div');
                statusDivId = "status" + n;
                cell3.className = "tasks-table__task-status";
                cell3.id = statusDivId;

                var cell3div = document.createElement('div');

                if(data[n].status == 0){
                    cell3div.className = "tasks-table__task-status_new";
                    cell3div.innerHTML = "New";
                } else if(data[n].status == 1) {
                    cell3div.className = "tasks-table__task-status_working";
                    cell3div.innerHTML = "Working";
                } else if(data[n].status == 2) {
                    cell3div.className = "tasks-table__task-status_done";
                    cell3div.innerHTML = "Done";
                }


                var cell4 = document.createElement('div');
                cell4.className = "tasks-table__task-name";
                cell4.innerHTML = data[n].name;

                var cell5 = document.createElement('div');
                cell5.className = "tasks-table__task-text";
                cell5.innerHTML = data[n].text;

                var cell6 = document.createElement('div');
                cell6.className = "tasks-table__task-details";
                cell6.innerHTML = "подробнее...";


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
            }//Отрисовка HTML и заполнение ячеек
        }
    });
    $.ajax({
        type: 'post',
        url: "script/php/select.php",
        data: {page: "projects"},
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
}
