//Функция для определения параметров загрузки страницы tasks
function preLoad() {
    var query = window.location.href.split("?")[1];
    if (typeof (query) != "undefined") {
        var params = query.split("&");
        if (id != '' && name != '') {
            var id = params[0].split("=")[1];
            var name = decodeURIComponent(params[1].split("=")[1]);
            loadTasks(id, name);
        }
    } else {
        loadTasks();
    }
}
