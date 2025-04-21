<?php
$tasks = json_decode(file_get_contents("tasks.json"), true);
$action = $_POST['action'];

if ($action === "add") {
    $taskText = trim($_POST['task']);
    if (!empty($taskText)) {
        $tasks[] = ["text" => htmlspecialchars($taskText), "done" => false];
    }
} elseif (isset($_POST['index'])) {
    $index = (int) $_POST['index'];
    if ($action === "toggle" && isset($tasks[$index])) {
        $tasks[$index]['done'] = !$tasks[$index]['done'];
    } elseif ($action === "delete" && isset($tasks[$index])) {
        array_splice($tasks, $index, 1);
    }
}

file_put_contents("tasks.json", json_encode($tasks, JSON_PRETTY_PRINT));
header("Location: index.php");
exit;
