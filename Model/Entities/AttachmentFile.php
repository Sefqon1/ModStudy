<?php

class AttachmentFile extends Entity
{
    private int $id;
    private string $name;
    private string $type;
    private string $fileLocation;
    private string $taskId;
    public function getId(): int
    {
        return $this->id;
    }
    public function setId($newId): void
    {
        $this->id = $newId;
    }

    public function getName(): string {
        return $this->name;
    }
    public function setName(string $name): void {
        $this->name = $name;
    }
    public function getType(): string {
        return $this->type;
    }
    public function setType(string $type): void {
        $this->type = $type;
    }
    public function getFileLocation(): string {
        return $this->fileLocation;
    }
    public function setFileLocation(string $fileLocation): void {
        $this->fileLocation = $fileLocation;
    }
    public function getTaskId(): string {
        return $this->taskId;
    }
    public function setTaskId(string $taskId): void {
        $this->taskId = $taskId;
    }
}