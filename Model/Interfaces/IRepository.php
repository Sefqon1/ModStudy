<?php

Interface IRepository
{
    public function getAll($connection, $table);
    public function getById($connection,$table, $id);
    public function create($connection, $table, $entity);
    public function update($connection, $table, $id, $entity);
    public function delete($connection, $table, $id);
}