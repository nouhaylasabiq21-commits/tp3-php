<?php

declare(strict_types = 1);

namespace App\Entity;
use App\Contract\ExportableInterface;


final class Etudiant extends Personne implements ExportableInterface {

    public function toArray() {
        return [
            'id' => $this->getId(),
            'role' => $this->getRole(),
            'nom' => $this->getNom(),
            'email' => $this->getEmail(),
            'filiere' => [
                'id' => $this->filiere->getId(),
                'libelle' => $this->filiere->getLibelle()
            ]
        ];
    }

    public function __construct($id, string $nom, string $email, Filiere $filiere) {
        parent::__construct($id, $nom, $email);
        $this->setFiliere($filiere);
    }

    public function getFiliere() {
        return $this->filiere;
    }

    public function setFiliere(Filiere $filiere) {
        $this->filiere = $filiere;
    }

    public function getRole() {
        return "Etudiant";
    }

}
