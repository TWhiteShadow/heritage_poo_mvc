<?php
namespace App\Models;
abstract class Media{

    private string $title;
    private string $auteur;
    private bool $disponible;

    public function __construct(string $title, string $auteur, bool $disponible){
        $this->title = $title;
        $this->auteur = $auteur;
        $this->disponible = $disponible;
    }

    public function emprunter(){
        if($this->disponible){
            $this->disponible = false;
            echo "Le média est emprunté";
        }else{
            echo "Le média n'est pas disponible";
        }
    }

    public function rendre(){
        if(!$this->disponible){
            $this->disponible = true;
            echo "Le média est rendu";
        }else{
            echo "Le média est déjà disponible";
        }
    }
}