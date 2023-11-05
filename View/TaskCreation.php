<?php
include('View/Header.php');
?>

    <div class="content">
        <div class="task-info">
            <form action="index.php?page=create/\" method="post">
                <div>
                <label  for="taskName"><strong>Task:</strong></label>
                <input type="text" class="form-control" id="taskName" name="taskName" required>
                </div>
                <div>
                <label for="taskDescription"><strong>Description:</strong></label>
                    <textarea class="form-control form-control-large" id="taskDescription" name="taskDescription"></textarea>
                </div>
                <div>
                <label for="dueDate"><strong>Due Date:</strong></label>
                <input type="date" class="form-control" id="dueDate" name="dueDate" required>
                </div>
        </div>
    </div>
<footer class="page-footer">
    <input type="submit" name="submit" value="Submit" class="bottom-tab">
    <button onclick="window.location.href='index.php?page=/'" class="bottom-tab" >Cancel</button>
</footer>
</form>
    </body>
</html>


