<?php
require_once 'dependencies.php';
class HomeController
{
    public function index($connection): void
    {
        $taskRepository = new TaskRepository($connection);
        $tasks = $taskRepository->getAll('parenttask');
        require 'View/Home.php';
    }
}
