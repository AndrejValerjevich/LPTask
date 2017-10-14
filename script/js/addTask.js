//Функция добавления нового задания
function addTask() {
    var query = window.location.href.split("?")[1];
    if (typeof (query) != "undefined") {
        var projectId = $('#projectId');
    } else {
        projectId = $('#project');
    }
    var status = $("#statuss");
    var type = $("#type");
    var name = $("#name");
    var text = $("#text");
    $.ajax({
        type: 'POST',
        url: "script/php/addTask.php",
        async: true,
        data: {
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
    cleanTasksForm('addTask');
    show('addPopup', 'none');
}
