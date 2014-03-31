<?php

/**
 * Description of Price
 *
 * @author Kuzich Yurii <qzichs@gmail.com>
 */
abstract class Price {

    abstract function getPriceCode();

    abstract function getCharge($daysRented);

    public function getFrequentRenterPoints($daysRented) {
        $frequentRenterPoints = 0;
        $frequentRenterPoints ++;
        return $frequentRenterPoints;
    }

}

?>
