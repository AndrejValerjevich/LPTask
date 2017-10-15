//Функция для определения параметров загрузки страницы tasks
function preLoad() {
    var query = window.location.href.split("?")[1];
    if (typeof (query) !== "undefined") {
        var params = query.split("&");
        if (id !== '' && name !== '') {
            var id = params[0].split("=")[1];
            var name = decodeURIComponent(params[1].split("=")[1]);
            loadTasks(id, name);//Если на страницу пришли методом get и передали параметры - вызываем функцию с параметрами (для входа в задачи конкретного Проекта)
        }
    } else {
        loadTasks();//Если страницу открыли просто так, то показываем все задачи
    }
}
