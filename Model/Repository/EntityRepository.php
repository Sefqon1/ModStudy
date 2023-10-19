<?php
require 'Model/Entities/Entity.php';
class EntityRepository extends AbstractRepository
{
    protected $connection;

    public function __construct($connection)
    {
        parent::__construct($connection);
    }



}