<?php
/**
 * Created by PhpStorm.
 * User: rimvydas
 * Date: 18.11.26
 * Time: 19.13
 */

namespace App\AgeCalculator;


class IsAdultService
{
    /**
     * @param $age
     * @return bool
     */
    public function checkIfAdult($age)
    {
        if ($age >= 20){
            return true;
        }else {
            return false;
        }
    }
}