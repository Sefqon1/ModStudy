<?php
echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ModStudy</title>
    <link rel="stylesheet" href="styles.css"> <!-- You can link your CSS file here -->
</head>
<body class="body">
<header class="page-header">
    <h1>ModStudy</h1>
</header>
<div class="content">
    <div class="top-tabs">
        <button class="top-tab" style="background: lightblue">To Do</button>
        <button class="top-tab" style="background: deepskyblue; color: #FAF9F6">In Progress</button>
        <button class="top-tab" style="background: lightgreen">Finished</button>
    </div>

            <div class="task-card">
                <div class="row">
                    <input type="checkbox">
                    <input type="text" value="Task Name">
                    <input type="date">
                </div>
                <div class="row">
                    <!-- Progress bar stand-in -->
                    <div class="progress-bar"> Progress Bar</div>
                    <button>See More</button>
                </div>
            </div>

    <!-- Repeat the card element as needed -->
</div>


<div class="bottom-tabs">
    <button class="bottom-tab">Tasks</button>
    <button class="bottom-tab">Calendar</button>
</div>
<!-- Include your PHP logic for repeating elements here -->

<!--<script src="script.js"></script>  You can link your JavaScript file here -->

</body>
</html>
HTML;
