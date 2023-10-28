<?php

class ChildTaskRepository extends AbstractRepository
{
    protected $connection;

    public function __construct($connection)
    {
        parent::__construct($connection);
    }

    public function getAll($task): array
    {
        $this->connection->begin_Transaction();
        $table = 'childtask';
        $id = $task->getId();
        try {
            $query = "SELECT * FROM {$table} WHERE parentId = {$id}";
            $result = $this->connection->query($query);

            if ($result === false) {
                throw new Exception("Query failed:" . $this->connection->error);
            }

            $results = [];

            while ($row = $result->fetch_assoc()) {
                $childTask = new ChildTask($row['name'], $row['description'], $row['isTaskDone'], $row['parentId'] );
                $results = $childTask;
            }

            $result->free_result();
            $this->connection->commit();

        } catch (Exception $e) {
            $this->connection->rollback();
            die($e->getMessage());
        }
        return $results;
    }


}