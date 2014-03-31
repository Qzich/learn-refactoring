<?php

namespace price;

/**
 * Description of NewReleasePrice
 *
 * @author Kuzich Yurii <qzichs@gmail.com>
 */
class NewReleasePrice extends \Price {

    public function getPriceCode() {
        return \Movie::NEW_RELEASE;
    }

    public function getCharge($daysRented) {
        $result = 0;

        $result += $daysRented * 3;

        return $result;
    }

    public function getFrequentRenterPoints($daysRented) {
        $frequentRenterPoints = parent::getFrequentRenterPoints($daysRented);
        if ($daysRented > 1)
            $frequentRenterPoints ++;
        return $frequentRenterPoints;
    }

}

?>
