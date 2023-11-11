<?php
require_once 'dependencies.php';
class HomeController
{
    public function index($connection): void
    {
        $taskRepository = new TaskRepository($connection);
        $initialTasks = $taskRepository->getAll('parenttask');
        $tasks = [];
        foreach ($initialTasks as $task) {
            if (!$task->getIsTaskDone()) {
                $tasks[] = $task;
            }
        }

        $tasks =$this->sortByDate($tasks);



        require 'View/Home.php';
    }

    public function sortByDate($tasks) : Array {
        $ord = array();
        foreach ($tasks as $task) {
            $ord[] = $task->getDueDate();
        }

        array_multisort($ord, SORT_ASC, $tasks);

        return $tasks;
    }


}
