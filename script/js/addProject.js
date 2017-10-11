//Функция добавления нового проекта
function addProject() {
    $.ajax({
        type: 'POST',
        url: "script/php/addProject.php",
        async: true,
        data: {
            name: $('#name').val(),
            key: $('#key').val(),
        },
        success: function(data){
            loadProjects();
        }
    });
    show('none');
}
