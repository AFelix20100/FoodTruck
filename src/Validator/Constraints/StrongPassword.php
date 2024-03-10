<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Class permettant d'afficher un message d'erreur si le mot de passe n'est pas fort.
 */
class StrongPassword extends Constraint
{
    public $message = 'Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial.';
}
