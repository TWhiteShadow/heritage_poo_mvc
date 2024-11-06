<?php
namespace Models;

class Book extends Media{
    private int $pageNumber;

    public function __construct(string $title, string $auteur, bool $disponible, int $pageNumber){
        parent::__construct($title, $auteur, $disponible);
        $this->pageNumber = $pageNumber;
    }

    public function getPageNumber(): int{
        return $this->pageNumber;
    }
}
