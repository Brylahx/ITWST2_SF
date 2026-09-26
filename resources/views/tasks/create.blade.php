<!DOCTYPE html>

<html>
<head>
    <title>Add Task</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<div class="container">


<div class="header">
    <h1>Add New Task</h1>
</div>

<div class="form-card">

    <form action="/tasks" method="POST">

        @csrf

        <div class="form-group">
            <label>Task Name:</label>

            <input type="text" name="task_name">
        </div>

        <div class="form-group">
            <label>Description:</label>

            <textarea name="description"></textarea>
        </div>

        <div class="form-group">
            <label>Status:</label>

            <select name="status">
                <option value="Pending">Pending</option>
                <option value="Completed">Completed</option>
            </select>
        </div>

        <div class="form-group">
            <label>Due Date:</label>

            <input type="date" name="due_date">
        </div>

        <button type="submit" class="submit-button">
            Add Task
        </button>

    </form>

    <a href="/" class="back-link">
        Back to Tasks
    </a>

</div>

</div>

</body>
</html>
