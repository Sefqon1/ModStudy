<?php

class AbstractTaskRepository implements IRepository
{

    /**
     * @param $connection
     * @param $table
     * @return array
     */
    public function getAll($connection, $table) : array
    {
        $connection->beginTransaction();


        try {
            $statement = $connection->query("SELECT * FROM {$table}");
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Query failed: ' . $e->getMessage());
        }

        return results;
    }

    /**
     * @param $connection
     * @param $table
     * @param $id
     * @return AbstractEntity
     */
    public function getById($connection, $table, $id) : AbstractEntity
    {
        $connection->beginTransaction();

        try {
            $statement = $connection->query("SELECT * FROM {$table} WHERE id = {$id}");
            $result = $statement->fetchAll(PDO::FETCH_CLASS, 'AbstractEntity');
        } catch (PDOException $e) {
            die('Query failed: ' . $e->getMessage());
        }
        return $result;
    }

    public function create($connection, $table, $entity)
    {
        $connection->beginTransaction();

        try {
            $statement = $connection->query("");
        }
    }

    public function update($connection, $table, $id, $entity)
    {
        // TODO: Implement update() method.
    }

    public function delete($connection, $table, $id)
    {
        // TODO: Implement delete() method.
    }
}