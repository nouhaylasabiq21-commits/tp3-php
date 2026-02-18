<?php

declare(strict_types = 1);

namespace App\Entity;

use App\Contract\IdentifiableInterface;

abstract class Personne implements IdentifiableInterface {

    protected $id;
    protected $nom;
    protected $email;

    public function __construct($id, string $nom, string $email) {
        $this->setId($id);
        $this->setNom($nom);
        $this->setEmail($email);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        if ($id !== null && $id <= 0) {
            throw new \InvalidArgumentException("Id invalide : doit être positif.");
        }
        $this->id = $id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom(string $nom) {
        $nom = trim($nom);
        if ($nom === '') {
            throw new \InvalidArgumentException("Nom obligatoire.");
        }
        $this->nom = $nom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail(string $email) {
        $email = trim($email);
        if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("Email invalide.");
        }
        $this->email = $email;
    }

    // Méthode abstraite : chaque sous-classe doit expliquer son "rôle"
    abstract public function getRole();

    // Méthode concrète commune : utile pour affichage/logs
    public function getLabel() {
        return $this->getRole() . " : " . $this->nom . " <" . $this->email . ">";
    }

}
