<?php

declare(strict_types = 1);

namespace App\Entity;
use App\Contract\ExportableInterface;

final class Enseignant extends Personne implements ExportableInterface {

    public function toArray() {
        return [
            'id' => $this->getId(),
            'role' => $this->getRole(),
            'nom' => $this->getNom(),
            'email' => $this->getEmail(),
            'grade' => $this->grade
        ];
    }

    public function __construct($id, string $nom, string $email, string $grade) {
        parent::__construct($id, $nom, $email);
        $this->setGrade($grade);
    }

    public function getGrade() {
        return $this->grade;
    }

    public function setGrade(string $grade) {
        $grade = trim($grade);
        if ($grade === '') {
            throw new \InvalidArgumentException("Le grade est obligatoire.");
        }
        $this->grade = $grade;
    }

    public function getRole() {
        return "Enseignant";
    }

}
