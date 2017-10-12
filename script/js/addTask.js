//Функция добавления нового задания
function addTask() {
    $.ajax({
        type: 'POST',
        url: "script/php/addTask.php",
        async: true,
        data: {
            project_id: $("#project").val(),
            status: $("#statuss").val(),
            type: $("#type").val(),
            name: $("#name").val(),
            text: $("#text").val()
        },
        success: function(data){
            loadTasks();
        }
    });
    show('addPopup', 'none');
}
