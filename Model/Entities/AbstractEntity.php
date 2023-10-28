<?php

abstract class AbstractEntity implements IEntity {

    private int $id;
    private string $name;

    public function __construct(int $id, string $name)
    {
        $this->id=$id;
        $this->name=$name;
    }

    public function getId() {
        return $this->id;
    }


    public function setId($newId) {
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
