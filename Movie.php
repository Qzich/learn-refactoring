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

}

?>
