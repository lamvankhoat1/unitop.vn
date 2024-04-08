const taskBodyElement = document.querySelector("#task-body");
let task_input = document.querySelector("#task-head input");
var taskList_array = [];
let addTaskElement = document.querySelector("#add-task");
addClickEvent(addTaskElement, addTask);
loadLocalStorage()


function addClickEvent(element, functionName) {
    element.addEventListener("click", functionName);
}

function removeClickEvent(element, functionName) {
    element.removeEventListener("click", functionName);
}

function addClickEventForAllTaskItem() {
    taskBodyElement.querySelectorAll(".task-item").forEach(taskItem => {
        addClickEvent(taskItem, completeTask);
        addClickEvent(taskItem.querySelector(".fa-pencil"), editTask);
        addClickEvent(taskItem.querySelector(".fa-xmark"), removeTask);
    })
}

function getTaskName() {
    return document.querySelector("#task-head input").value;
}

function preventDefault(e) {
    e.preventDefault();
}

function templateHTMLNewTask(taskName, isComplete) {
    let completeClass = (isComplete) ? "complete" : "";
    return `<div class="task-item clearfix ${completeClass}">${taskName}<div class="task-action float-right"><i class="fa-solid fa-pencil"></i><i class="fa-solid fa-xmark"></i></div>`
}

function indexCurrentTask(currentTaskElement) {
    return Array.from(taskBodyElement.querySelectorAll(".task-item")).indexOf(currentTaskElement);
}



function addTask(e) {
    preventDefault(e);
    if(this.innerText == "EDIT TASK"){
        taskList_array[indexCurrentTask(taskBodyElement.querySelector(".editting"))].taskName = task_input.value;
        taskBodyElement.querySelector(".editting").outerHTML = templateHTMLNewTask(task_input.value);
        saveToLocaStorage(taskList_array);
        // reset
        this.innerText = "ADD TASK";
        task_input.value = "";
        task_input.blur();
        addClickEventForAllTaskItem();
        return "CANCLE";
    }

    let taskName = getTaskName();
    // check duplicate
    for(let task of taskList_array) {
        if(taskName.trim().toUpperCase() == task.taskName.trim().toUpperCase()) {
            alert("Công việc này đã được thêm");
            return "CANCLE";
        }
    }
    taskBodyElement.innerHTML += templateHTMLNewTask(taskName);
    // addEventListent For New Task
    addClickEventForAllTaskItem()

    taskList_array.push({
        taskName: taskName,
        isComplete: false
    })
    saveToLocaStorage(taskList_array);
    task_input.value = "";
}

function addTaskFromLocalStorage(task) {
    taskBodyElement.innerHTML += templateHTMLNewTask(task.taskName, task.isComplete);
    addClickEventForAllTaskItem();

}

function completeTask(e) {
    this.classList.toggle("complete");
    
    if(this.classList.contains("complete")) {
        taskList_array[indexCurrentTask(this)].isComplete = true;
    } else {
        taskList_array[indexCurrentTask(this)].isComplete = false;
    }
    saveToLocaStorage(taskList_array);
}

function editTask(e) {
    let currentTask = this.closest(".task-item")
    let currentTaskName = currentTask.innerText;
    addTaskElement.innerText = "EDIT TASK"
    task_input.focus();
    task_input.value = currentTaskName;
    currentTask.classList.add("editting");

    e.stopPropagation();
    preventDefault(e);
}

function removeTask(e) {
    let confirmDialogue = confirm("Bạn có chắc muốn xoá công việc này?");
    if(!confirmDialogue) {
        e.stopPropagation();
        return "KHÔNG XOÁ";
    }
    console.log("remove")
    let currentTask = this.closest(".task-item");
    console.log(indexCurrentTask(currentTask))
    taskList_array.splice(indexCurrentTask(currentTask), 1);
    currentTask.remove();
    saveToLocaStorage(taskList_array)
    console.log(taskList_array);
    e.stopPropagation();
}

// local storage
function saveToLocaStorage(taskList_array) {
    notify();
    localStorage.setItem("task-list", JSON.stringify(taskList_array));
}


function loadLocalStorage() {
    let taskList_localStorage = localStorage.getItem("task-list");
    taskList_array = taskList_localStorage == null ? [] : JSON.parse(taskList_localStorage);
    console.log(taskList_array)
    for (let task of taskList_array) {
        addTaskFromLocalStorage(task);
    }
    notify();
}

function notify() {
    if(taskList_array.length > 0) {
        let templateNotify = "Yeah, <number> task  completed";
        let numberOfTaskComplete = taskList_array.filter(task => task.isComplete).length;
        let result = templateNotify.replace("<number>", (numberOfTaskComplete == taskList_array.length ? "all" : numberOfTaskComplete));
        result = result.replace("Yeah, 0 ", "0 ")
        document.querySelector("#task-footer").innerHTML = result;
    } else {
        document.querySelector("#task-footer").innerHTML = "Chưa có công việc nào được thêm";
    }
}