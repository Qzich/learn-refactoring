<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Customer
 *
 * @author Kuzich Yurii <qzichs@gmail.com>
 */
class Customer {

    private $_name;
    private $_rentals = array();

    /**
     * 
     * @param string $name
     */
    public function __construct($name) {
        $this->_name = $name;
    }

    /**
     * 
     * @param Rental $arg
     */
    public function addRental($arg) {
        $this->_rentals[] = $arg;
    }

    /**
     * 
     * @return string
     */
    public function getName() {
        return $this->_name;
    }

    public function statement() {
        $totalAmount = 0;
        $frequentRenterPoints = 0;
        $result = "Учет аренды для " . $this->getName() . "\n";

        foreach ($this->_rentals as $each) {
            
// добавить очки для активного арендатора
            $frequentRenterPoints ++;
// бонус за аренду новинки на два дня
            if (($each->getMovie()->getPriceCode() == Movie :: NEW_RELEASE) &&
                    $each->getDaysRented() > 1)
                $frequentRenterPoints ++;
            
//показать результаты для этой аренды
            $result .= "\t" . $each->getMovie()->getTitle() . "\t" . $each->getCharge() . "\n";
            $totalAmount += $each->getCharge();
        }
//добавить нижний колонтитул
        $result .= "Сумма задолженности составляет " . $totalAmount . "\n";
        $result .= "Вы заработали " . $frequentRenterPoints . " очков за активность";
        return $result;
    }

}

?>
