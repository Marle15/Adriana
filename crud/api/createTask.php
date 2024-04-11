<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
</head>
<body>
    <h2>Create New Task</h2>
    <form action="create_task.php" method="POST">
        <label for="task_name">Task Name:</label><br>
        <input type="text" id="task_name" name="task_name" required><br><br>

        <label for="task_description">Task Description:</label><br>
        <textarea id="task_description" name="task_description" rows="4" required></textarea><br><br>

        <input type="submit" value="Create Task">
    </form>
</body>
</html>
