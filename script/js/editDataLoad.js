function editDataLoad(taskId) {
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

                editProject.appendChild(projectName);

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

                editStatuss.appendChild(statusName);

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

                editType.appendChild(typeName);

            }
        }
    });
    $.ajax({
        type: 'post',
        url: "script/php/select.php",
        data: {table: "tasks", task_id: taskId},
        dataType: 'json',
        success: function(data) {
            for (var n in data) {
                $('#taskId').val(data[n].TaskId);
                $('#editName').val(data[n].Name);
                $('#editProject').find('option[value=' + data[n].ProjectId + ']').prop("selected", true);
                $('#editStatuss').find('option[value=' + data[n].StatusId + ']').prop("selected", true);
                $('#editType').find('option[value=' + data[n].TypeId + ']').prop("selected", true);
                $('#editText').val(data[n].Text);
            }
        }
    });
}

