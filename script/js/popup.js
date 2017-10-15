    //Функция показа форм
    function show(popup, state, taskId){
    if (popup === "editPopup" && typeof (taskId) !== "undefined") {//Загрузка данных задачи на форму editTask
        editDataLoad(taskId);
    } else if (popup === "editPopup" && state === "none"){//Очистка формы editTask при закрытии
        cleanTasksForm('editTask');
    } else if (popup === "addPopup" && state === "block") {//Сокрытие поля projects в
        var query = window.location.href.split("?")[1];    // форме добавления, если открыта страница конктретного проекта
        if (typeof (query) !== "undefined") {
            $('#project').css("display","none");
            $('#projectLabel').css("display","none");
        }
    }
        for (var i = 0; i < 1; i++) {
            document.getElementsByClassName(popup)[i].style.display = state;
            document.getElementsByClassName('wrap-window')[i].style.display = state;
        }
    }