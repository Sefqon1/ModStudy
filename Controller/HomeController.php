<?php
class HomeController {
    public function index(): void
    {
        require 'View/homeView.php';
    }

    public function edit(): void
    {
        require 'View/taskEditView.html';
    }
}