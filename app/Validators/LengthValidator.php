<?php

namespace Validators;

use Illuminate\Database\Capsule\Manager as Capsule;
use Src\Validator\AbstractValidator;

class LengthValidator extends AbstractValidator
{

    protected string $message = 'Field :field need length minimum 4 symbols';

    public function rule(): bool
    {
        if (strlen($this->value) >= 4) {
            return true;
        }
        else {
            return false;
        }
    }
}