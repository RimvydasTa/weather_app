<?php
/**
 * Created by PhpStorm.
 * User: rimvydas
 * Date: 18.11.26
 * Time: 19.13
 */

namespace App\AgeCalculator;


class AgeCalculatorManager
{
    private $ageCalculator;
    private $adultChecker;

    /**
     * AgeCalculatorManager constructor.
     * @param AgeCalculatorService $ageCalculator
     * @param IsAdultService $adultChecker
     */
    public function __construct(AgeCalculatorService $ageCalculator,IsAdultService $adultChecker)
    {
        $this->ageCalculator = $ageCalculator;
        $this->adultChecker = $adultChecker;
    }

    /**
     * @param $birthDate
     * @return int
     * @throws \Exception
     */
    public function calculateAge($birthDate)
    {
        if ($birthDate){
            $personAge = $this->ageCalculator->calculateAgeByBirthDate($birthDate);
            return $personAge;
        }
        return false;
    }

    /**
     * @param $ageInput
     * @param $personAge
     * @return bool
     */
    public function adultChecker($ageInput, $personAge)
    {
        if ($ageInput){
            return $isAdult = $this->adultChecker->checkIfAdult($personAge);
        }
        return false;
    }

}