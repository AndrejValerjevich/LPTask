//Функция изменения имеющегося задания
function editTask() {
    var taskId = $("#taskId");
    var projectId = $('#editProject');
    var status = $("#editStatuss");
    var type = $("#editType");
    var name = $("#editName");
    var text = $("#editText");
    var projectName = projectId.text();
    $.ajax({
        type: 'POST',
        url: "script/php/editTask.php",
        async: true,
        data: {
            task_id: taskId.val(),
            project_id: projectId.val(),
            status: status.val(),
            type: type.val(),
            name: name.val(),
            text: text.val()
        },
        success: function(data){
            preLoad();
        }
    });
    cleanTasksForm('editTask');
    cleanTasksForm('addTask');
    show('editPopup', 'none');
}
