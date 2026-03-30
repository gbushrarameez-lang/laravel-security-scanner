<?php

namespace Bushra\SecurityScanner\Scanner;

use Bushra\SecurityScanner\Scanner\Rules\SqlInjectionRule;
use Bushra\SecurityScanner\Scanner\Rules\MassAssignmentRule;

class Scanner
{
    protected array $rules = [];

    public function __construct()
    {
        $this->rules = [
            new SqlInjectionRule(),
            new MassAssignmentRule(),
        ];
    }

    public function scan($code)
    {
        $issues = [];

        foreach ($this->rules as $rule) {
            $issues = array_merge($issues, $rule->check($code));
        }

        return $issues;
    }
}
