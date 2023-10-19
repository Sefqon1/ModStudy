<?php

Interface IRepository
{
    public function getAll($table);
    public function getById($table, $id);
    public function create($table, $entity);
    public function update($table, $id, $entity);
    public function delete($table, $id);
}