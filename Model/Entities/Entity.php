<?php
require 'Model/Entities/AbstractEntity.php';
class Entity extends AbstractEntity
{
    private int $id;
    private string $name;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($newId): void
    {
        $this->id = $newId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

}