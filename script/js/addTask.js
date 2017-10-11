//Функция добавления нового задания
function addTask() {
    $.ajax({
        type: 'POST',
        url: "script/php/addTask.php",
        async: true,
        data: {
            project_id: $("#project").val(),
            status: $("#status").val(),
            type: $("#type").val(),
            name: $("#name").val(),
            text: $("#text").val()
        },
        success: function(data){
            loadTasks();
            $("#resp").html(data);
        }
    });
    show('none');
}
