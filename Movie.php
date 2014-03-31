<?php

/**
 * Description of Movie
 *
 * @author Kuzich Yurii <qzichs@gmail.com>
 */
class Movie {

    const CHILDRENS = 2;
    const REGULAR = 0;
    const NEW_RELEASE = 1;

    private $_title;
    private $_priceCode;

    public function __construct($title, $priceCode) {
        $this->_title = $title;
        $this->_priceCode = $priceCode;
    }

    /**
     * 
     * @return int
     */
    public function getPriceCode() {
        return $this->_priceCode;
    }

    /**
     * 
     * @param int $arg
     */
    public function setPriceCode($arg) {
        $this->_priceCode = arg;
    }

    /**
     * 
     * @return string
     */
    public function getTitle() {
        return $this->_title;
    }

    /**
     * 
     * @param int $daysRented
     * @return int
     */
    public function getCharge($daysRented) {
        $result = 0;
        switch ($this->getPriceCode()) {
            case Movie::REGULAR:
                $result += 2;
                if ($daysRented > 2)
                    $result += ($daysRented - 2 ) * 1.5;
                break;
            case Movie ::NEW_RELEASE:
                $result += $daysRented * 3;
                break;
            case Movie ::CHILDRENS:
                $result += 1.5;
                if ($daysRented > 3)
                    $result += ($daysRented - 3) * 1.5;
                break;
        }
        return $result;
    }

    /**
     * 
     * @param int $daysRented
     * @return int
     */
    public function getFrequentRenterPoints($daysRented) {
        $frequentRenterPoints = 0;
        $frequentRenterPoints ++;
        // бонус за аренду новинки на два дня
        if (($this->getPriceCode() == Movie :: NEW_RELEASE) &&
                $daysRented > 1)
            $frequentRenterPoints ++;
        return $frequentRenterPoints;
    }

}

?>
