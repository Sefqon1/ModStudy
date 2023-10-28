<?php

$name = $task->getName();
$description = $task->getDescription();
$childTasks = $task->getChildTasks();

echo $name;
echo $description;
echo "\r\n";

foreach ($childTasks as $childTask) {
    echo $childTask->getName();
    echo $childTask->getDescription();
    echo "\r\n";
}

