<?php

namespace Models;
class Album extends Media{
    private int $songNumber;
    private string $editor;

    public function __construct(string $title, string $auteur, bool $disponible, int $songNumber){
        parent::__construct($title, $auteur, $disponible);
        $this->songNumber = $songNumber;
    }

    public function getSongNumber(): int{
        return $this->songNumber;
    }
    public function getEditor(): string{
        return $this->editor;
    }
}

