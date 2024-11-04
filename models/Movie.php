<?php
namespace Models;

class Movie extends Media{
    private float $duration;
    private string $genre;

    public function __construct(string $title, string $auteur, bool $disponible, float $duration, string $genre){
        parent::__construct($title, $auteur, $disponible);
        $this->duration = $duration;
        $this->genre = $genre;
    }
    public function getDuration(): float{
        return $this->duration;
    }
    public function getGenre(): string{
        return $this->genre;
    }
}