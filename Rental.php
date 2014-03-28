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
