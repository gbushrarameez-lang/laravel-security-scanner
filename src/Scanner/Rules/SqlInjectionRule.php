<?php

namespace Bushra\SecurityScanner\Scanner\Rules;

class SqlInjectionRule
{
    public function check($code)
    {
        $issues = [];
        $lines = explode("\n", $code);

        foreach ($lines as $i => $line) {

            if (preg_match('/DB::select\s*\(.*\$.*\)/', $line)) {
                $issues[] = [
                    'line' => $i + 1,
                    'severity' => 'HIGH',
                    'message' => 'Possible SQL Injection (DB::select with variable)'
                ];
            }

            if (preg_match('/whereRaw\s*\(.*\$.*\)/', $line)) {
                $issues[] = [
                    'line' => $i + 1,
                    'severity' => 'HIGH',
                    'message' => 'Unsafe whereRaw usage'
                ];
            }
        }

        return $issues;
    }
}
