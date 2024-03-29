<?php

Interface IRepository
{
    public function getAll($table);
    public function getById($table, $id);
    public function create($table, $entity);
    public function update($table, $entity);
    public function delete($table, $id);
}