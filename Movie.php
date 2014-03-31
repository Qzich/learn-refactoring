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

    /**
     *
     * @var Price
     */
    private $_price;

    public function __construct($title, $priceCode) {
        $this->_title = $title;
        $this->setPriceCode($priceCode);
    }

    /**
     * 
     * @return int
     */
    public function getPriceCode() {
        return $this->_price->getPriceCode();
    }

    /**
     * 
     * @param int $arg
     */
    public function setPriceCode($arg) {
        switch ($arg) {
            case Movie::REGULAR:
                $this->_price = new price\RegularPrice();
                break;
            case Movie ::NEW_RELEASE:
                $this->_price = new price\NewReleasePrice();
                break;
            case Movie ::CHILDRENS:
                $this->_price = new price\ChildrensPrice();
                break;
        }
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
        return $this->_price->getCharge($daysRented);
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
