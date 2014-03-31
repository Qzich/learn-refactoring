<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rental
 *
 * @author Kuzich Yurii <qzichs@gmail.com>
 */
class Rental {

    private $_movie;
    private $_daysRented;

    /**
     * 
     * @param Movie $movie
     * @param int $daysRented
     */
    public function __construct(Movie $movie, $daysRented) {
        $this->_movie = $movie;
        $this->_daysRented = $daysRented;
    }

    public function getCharge() {
        $result = 0;
        switch ($this->getMovie()->getPriceCode()) {
            case Movie::REGULAR:
                $result += 2;
                if ($this->getDaysRented() > 2)
                    $result += ($this->getDaysRented() - 2 ) * 1.5;
                break;
            case Movie ::NEW_RELEASE:
                $result += $this->getDaysRented() * 3;
                break;
            case Movie ::CHILDRENS:
                $result += 1.5;
                if ($this->getDaysRented() > 3)
                    $result += ($this->getDaysRented() - 3) * 1.5;
                break;
        }
        return $result;
    }

    public function getFrequentRenterPoints() {
        $frequentRenterPoints = 0;
        $frequentRenterPoints ++;
    // бонус за аренду новинки на два дня
        if (($this->getMovie()->getPriceCode() == Movie :: NEW_RELEASE) &&
                $this->getDaysRented() > 1)
            $frequentRenterPoints ++;
        return $frequentRenterPoints;
    }

    /**
     * 
     * @return int
     */
    public function getDaysRented() {
        return $this->_daysRented;
    }

    /**
     * 
     * @return Movie
     */
    public function getMovie() {
        return $this->_movie;
    }

}

?>
