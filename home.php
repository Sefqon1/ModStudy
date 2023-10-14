<?php


//require_once 'Config/config.php'; // Include configuration settings
require_once 'Controller/HomeController.php'; // Include controllers

// Initialize any components (e.g., database connections, sessions)

// Route the request
$controller = new HomeController();
$controller->index(); // Assuming 'HomeController' has an 'index' method

// You might also handle errors and routing here.
