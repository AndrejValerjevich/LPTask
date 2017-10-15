//Функция очистки элементов форм добавления и изменения задачи во измежание дублирования данных
function cleanTasksForm(formType) {
    if (formType === "editTask") {
        var taskId = $("#taskId");
        var projectId = $('#editProject');
        var status = $("#editStatuss");
        var type = $("#editType");
        var name = $("#editName");
        var text = $("#editText");
        taskId.empty();
    } else if (formType === "addTask") {
        projectId = $('#project');
        status = $("#statuss");
        type = $("#type");
        name = $("#name");
        text = $("#text");
    }

    projectId.empty();
    status.empty();
    type.empty();
    name.empty();
    text.empty();
}
