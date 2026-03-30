<?php

namespace Bushra\SecurityScanner\Scanner\Rules;

class MassAssignmentRule
{
    public function check($code)
    {
        $issues = [];
        $lines = explode("\n", $code);

        foreach ($lines as $i => $line) {

            if (preg_match('/create\s*\(\s*\$request->all/', $line)) {
                $issues[] = [
                    'line' => $i + 1,
                    'severity' => 'HIGH',
                    'message' => 'Mass assignment risk (use validated data)'
                ];
            }
        }

        return $issues;
    }
}
