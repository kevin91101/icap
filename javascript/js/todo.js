let section = document.querySelector("section");

let add = document.querySelector("form button");
add.addEventListener("click", e => {
    e.preventDefault();
    let form = e.target.parentElement;
    let todoText = form.children[0].value;
    let todoYear = form.children[1].value;
    let todoMonth = form.children[2].value;
    let todoDate = form.children[3].value;

    let todo = document.createElement("div");
    todo.classList.add("todo");
    let text = document.createElement("p");
    todo.classList.add("todo-text");
    text.innerText = todoText;
    let time = document.createElement("p");
    time.classList.add("todo-time");
    time.innerText = todoYear + "/" + todoMonth + "/" + todoDate;
    todo.appendChild(text);
    todo.appendChild(time);

    section.appendChild(todo);
});
