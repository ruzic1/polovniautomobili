<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class FullNameRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

     private $pattern;
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //

    }
    public function __construct($value)
    {
        $this->pattern=$value;
    }
    public function passes($attribute, mixed $value){
        if(preg_match('/^[A-Za-z]{3,30}$/',$value)){
            return true;
        }
        else return false;
    }
}
