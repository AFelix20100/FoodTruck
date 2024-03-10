<?php

// src/Validator/Constraints/ValidEmailDomain.php
namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Classe permettant d'afficher les messages d'erreurs.
 */
class ValidEmailDomain extends Constraint
{
    public $message = 'Seules les adresses e-mail de domaine "campus28.fr" sont autorisées.';
}
