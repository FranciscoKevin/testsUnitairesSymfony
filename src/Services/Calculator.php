<?php

namespace App\Services;

class Calculator
{
    public function addition($a, $b)
    {
        return $a + $b;
    }

    public function soustraction($a, $b)
    {
        return $a - $b;
    }

    public function multiplication($a, $b)
    {
        return $a * $b;
    }

    public function division($a, $b)
    {
        return $a / $b;
    }
}