<?php

namespace price;

/**
 * Description of RegularPrice
 *
 * @author Kuzich Yurii <qzichs@gmail.com>
 */
class RegularPrice extends \Price {

    public function getPriceCode() {
        return \Movie::REGULAR;
    }

    public function getCharge($daysRented) {
        $result = 0;
        $result += 2;
        if ($daysRented > 2)
            $result += ($daysRented - 2 ) * 1.5;
        return $result;
    }

}

?>
