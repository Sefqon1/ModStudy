<?php

abstract class AbstractEntity implements IEntity {

    private int $id;

    public function getId() {
        return $this->id;
    }


    public function setId($newId) {
        $this->id = $newId;
    }


}
