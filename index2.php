<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<ul class="nav">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">Déconnexion</a>
  </li>
</ul>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>To Do List</title>
	<!-- Bootstrap CSS -->
	<link href=
"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
		rel="stylesheet">
</head>

<body>
	<div class="container mt-5">
		<h1 class="text-center mb-4">To Do List</h1>
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<form id="todo-form">
							<div class="input-group mb-3">
								<input type="text" class="form-control"
									id="todo-input"
									placeholder="Add new task"
									required>
								<button class="btn btn-primary" type="submit">
									Add
								</button>
							</div>
						</form>
						<ul class="list-group" id="todo-list">
							<!-- Tasks will be added here dynamically -->
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src=
"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
	</script>
	<script>
		// Fonction permettant d'ajouter une nouvelle tâche
		function addTask(task) {
			const todoList = document.getElementById("todo-list");
			const li = document.createElement("li");
			li.className = "list-group-item d-flex justify-content-between align-items-center";
			li.innerHTML = `
		<span class="task-text">${task}</span>
		<input type="text" class="form-control edit-input" style="display: none;" value="${task}">
		<div class="btn-group">
		<button class="btn btn-danger btn-sm delete-btn">✕</button>
		<button class="btn btn-primary btn-sm edit-btn">✎</button>
		</div>
	`;
			todoList.appendChild(li);
		}

		// Event listener for form submission
		document.getElementById("todo-form").addEventListener("submit",
			function (event) {
				event.preventDefault();
				const taskInput = document.getElementById("todo-input");
				const task = taskInput.value.trim();
				if (task !== "") {
					addTask(task);
					taskInput.value = "";
				}
			});

		// Evènement permettant de supprimer une tâche 
		document.getElementById("todo-list").addEventListener("click",
			function (event) {
				if (event.target.classList.contains("delete-btn")) {
					event.target.parentElement.parentElement.remove();
				}
			});

		// Evènement permettant d'éditer une tâche 
		document.getElementById("todo-list").addEventListener("click", function (event) {
			if (event.target.classList.contains("edit-btn")) {
				const taskText = event.target.parentElement
					.parentElement.querySelector(".task-text");
				const editInput = event.target.parentElement
					.parentElement.querySelector(".edit-input");
				if (taskText.style.display !== "none") {
					taskText.style.display = "none";
					editInput.style.display = "block";
					editInput.focus();
					event.target.innerHTML = "";
				} else {
					taskText.textContent = editInput.value;
					taskText.style.display = "inline";
					editInput.style.display = "none";
					event.target.innerHTML = "✎";
				}
			}
		});

		// Evènement permettant d'ajouter une tâche 
		defaultTasks.forEach(task => addTask(task));
	</script>
</body>

</html>

    
</body>
</html>