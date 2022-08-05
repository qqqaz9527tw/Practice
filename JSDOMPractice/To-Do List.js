// Variables

const addTask = document.getElementById('add-task');
const inputTask = document.getElementById('input-task');
const taskContainer = document.getElementById('task-container');

// Event Listener for Add Button

addTask.addEventListener('click', function () {

    let task = document.createElement('div');
    task.classList.add('task');

    let li = document.createElement('li');
    li.innerText = `${inputTask.value}`;
    task.appendChild(li);
    //Add or remove multiple classes to the an element: classList function
    let checkButton = document.createElement("button");
    checkButton.innerHTML = `<i class="fa fa-check"></i>`;
    checkButton.classList.add('checkTask');
    task.appendChild(checkButton);

    let deleteButton = document.createElement("button");
    deleteButton.innerHTML = `<i class="fa fa-trash-o"></i>`;
    deleteButton.classList.add('deleteTask');
    task.appendChild(deleteButton);

    if (inputTask.value === "") {
        alert('Please Enter a Task');
    } else {
        taskContainer.appendChild(task);
    }

    inputTask.value = "";

    checkButton.addEventListener('click', function () {

        checkButton.parentElement.style.textDecoration = ("line-through");
    });

    deleteButton.addEventListener('click', function (e) {

        let target = e.target;

        target.parentElement.parentElement.remove();
    });

});