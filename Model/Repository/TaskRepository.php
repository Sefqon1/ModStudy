<?php
require 'Model/Entities/ParentTask.php';

class TaskRepository extends AbstractRepository
{
    protected $connection;

    public function __construct($connection)
    {
        parent::__construct($connection);
    }

    public function getAll($table): array
    {
        $this->connection->begin_transaction();

        try {
            $query = "SELECT * FROM {$table}";
            $result = $this->connection->query($query);

            if ($result === false) {
                throw new Exception("Query failed:" . $this->connection->error);
            }
            $results = [];

            while ($row = $result->fetch_assoc()) {
                $dueDate = new DateTime($row['dueDate']);
                $task = new ParentTask($row['id'], $row['name'], $row['description'], $dueDate, $row['isTaskDone']);
                $results[] = $task;
            }

            $result->free_result();
            $this->connection->commit();

        } catch (Exception $e) {
            $this->connection->rollback();
            die($e->getMessage());
        }

        return $results;
    }

    public function getById($table, $id): ParentTask
    {
        $this->connection->begin_transaction();

        try {
            $query = "SELECT * FROM {$table} WHERE id = {$id} ";
            $result = $this->connection->query($query);

            if ($result === false) {
                throw new Exception("Query failed:" . $this->connection->error);
            }

            $row = $result->fetch_assoc();
            $dueDate = new DateTime($row['dueDate']);
            $task = new ParentTask($row['id'], $row['name'], $row['description'], $dueDate, $row['isTaskDone']);
            $this->connection->commit();

        } catch (Exception $e) {
            $this->connection->rollback();
            die($e->getMessage());
        }

        $childTaskRepository = new ChildTaskRepository($this->connection);
        $task->setChildTask($childTaskRepository->getAll($task));

        return $task;
    }
}
