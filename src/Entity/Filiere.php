<?php

declare(strict_types = 1);

namespace App\Entity;

final class Filiere {

    private $id;
    private $libelle;

    public function __construct($id, string $libelle) {
        $this->id = $id;
        $this->libelle = $libelle;
    }

    public function getId() {
        return $this->id;
    }

    public function getLibelle() {
        return $this->libelle;
    }

}
