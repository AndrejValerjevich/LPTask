    //Функция показа
    function show(popup, state, taskId){
    if (popup == "editPopup" && typeof (taskId) != "undefined") {
        editDataLoad(taskId);
    } else if (popup == "editPopup" && state == "none"){
        cleanTasksForm('editTask');
    } else if (popup == "addPopup" && state == "block") {
        var query = window.location.href.split("?")[1];
        if (typeof (query) != "undefined") {
            $('#project').css("display","none");
            $('#projectLabel').css("display","none");
        }
    }
        for (var i = 0; i < 1; i++) {
            document.getElementsByClassName(popup)[i].style.display = state;
            document.getElementsByClassName('wrap-window')[i].style.display = state;
        }
    }