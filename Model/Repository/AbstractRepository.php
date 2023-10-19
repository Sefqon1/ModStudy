<?php

abstract class AbstractRepository implements IRepository
{
    protected $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function getAll($table) : array
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
                $entity = new Entity($row['id'], $row['name']);
                $results[] = $entity;
            }

            $result->free_result();
            $this->connection->commit();

        } catch (Exception $e) {
            $this->connection->rollback();
            die($e->getMessage());
        }

        return $results;
    }


    public function getById($table, $id) : Entity
    {
        $this->connection->begin_transaction();

        try {
            $query = "SELECT * FROM {$table} WHERE id = {$id} ";
            $result = $this->connection->query($query);

            if ($result === false) {
                throw new Exception("Query failed:" . $this->connection->error);
            }

            $row = $result->fetch_assoc();
            $entity = new Entity($row['id'], $row['name']);
            $this->connection->commit();

        } catch (Exception $e) {
            $this->connection->rollback();
            die($e->getMessage());
        }

        return $entity;
    }

    //TODO: Fix commit() and rollback()

    public function create($table, $entity) : bool
    {
        $this->connection->begin_transaction();

        if($this->validateInput($entity)) {
            try {
                $query = "INSERT INTO {$table} (name) VALUES ('{$entity->getName()}')";
                $result = $this->connection->query($query);

                if ($result) {
                    $this->connection->commit();
                } else {
                    $this->connection->rollback();
                }
                return $result;

            } catch (Exception $e) {
                $this->connection->rollback();
                die($e->getMessage());
            }
        } else {
            return false;
        }
    }

    public function update($table, $id, $entity) : bool
    {
        $this->connection->begin_transaction();

        if ($this->validateInput($entity)) {

            try {
                $query = "UPDATE {$table} SET name = '{$entity->getName()}' WHERE id={entity->getId()}";
                return $this->connection->query($query);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        } else {
            return false;
        }
    }

    public function delete($table, $id) : bool
    {
        $this->connection->begin_transaction();

            try {
                $query = "DELETE FROM {$table} WHERE id = {$id}";
                return $this->connection->query($query);
            } catch (Exception $e) {
                die($e->getMessage());
            }
    }

    private function validateInput($entity): bool
    {
        try {
            $reflection = new ReflectionObject($entity);

            foreach ($reflection->getProperties() as $property) {
                $property->setAccessible(true);

                if ($property->getName() === 'id') {
                    continue;
                }
                $value = $property->getValue($entity);
                if ($value === null) {
                    throw new Exception("Entered Data Incorrect.");
                }
            }
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}