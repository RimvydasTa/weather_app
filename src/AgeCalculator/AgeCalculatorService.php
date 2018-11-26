<?php
/**
 * Created by PhpStorm.
 * User: rimvydas
 * Date: 18.11.26
 * Time: 19.13
 */

namespace App\AgeCalculator;


class AgeCalculatorService
{

    /**
     * @param $birthDate
     * @return int
     * @throws \Exception
     */
    public function calculateAgeByBirthDate($birthDate)
    {
        $age = \DateTime::createFromFormat('Y-m-d', $birthDate)
            ->diff(new \DateTime('now'))
            ->y;
        return $age;
    }
}