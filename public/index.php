<?php

declare(strict_types = 1);

/**
 * Autoload PSR-4 simple
 */
spl_autoload_register(function ($class) {

    $prefix = 'App\\';
    $base_dir = __DIR__ . '/../src/';

    $len = strlen($prefix);

    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);

    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

use App\Entity\Filiere;
use App\Entity\Etudiant;
use App\Entity\Enseignant;
use App\Service\PrinterService;

$fInfo = new Filiere(1, "Informatique");

$e1 = new Etudiant(null, "Sara", "sara@example.com", $fInfo);
$e2 = new Etudiant(null, "Youssef", "youssef@example.com", $fInfo);

$ens1 = new Enseignant(null, "Dr Karim", "karim@example.com", "Maitre de conferences");

$personnes = [$e1, $e2, $ens1];

$printer = new PrinterService();
$printer->printLabels($personnes);

echo "<pre>";
print_r($e1->toArray());
print_r($ens1->toArray());
echo "</pre>";
