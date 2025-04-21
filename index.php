<?php
$tasks = json_decode(file_get_contents("tasks.json"), true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Simple To-Do App</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <h1>To-Do List</h1>

  <form action="task.php" method="POST">
    <input type="text" name="task" placeholder="New Task">
    <button type="submit" name="action" value="add">Add</button>
  </form>

  <ul>
    <?php foreach ($tasks as $index => $task): ?>
      <li class="<?= $task['done'] ? 'done' : '' ?>">
        <form style="display:inline;" method="POST" action="task.php">
          <input type="hidden" name="index" value="<?= $index ?>">
          <button type="submit" name="action" value="toggle"><?= htmlspecialchars($task['text']) ?></button>
        </form>
        <form style="display:inline;" method="POST" action="task.php">
          <input type="hidden" name="index" value="<?= $index ?>">
          <button type="submit" name="action" value="delete">Delete</button>
        </form>
      </li>
    <?php endforeach; ?>
  </ul>
</body>
</html>
