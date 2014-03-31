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

    private function amountFor(Rental $aRental) {
        $result = 0;
        switch ($aRental->getMovie()->getPriceCode()) {
            case Movie::REGULAR:
                $result += 2;
                if ($aRental->getDaysRented() > 2)
                    $result += ($aRental->getDaysRented() - 2 ) * 1.5;
                break;
            case Movie ::NEW_RELEASE:
                $result += $aRental->getDaysRented() * 3;
                break;
            case Movie ::CHILDRENS:
                $result += 1.5;
                if ($aRental->getDaysRented() > 3)
                    $result += ($aRental->getDaysRented() - 3) * 1.5;
                break;
        }
        return $result;
    }

    public function statement() {
        $totalAmount = 0;
        $frequentRenterPoints = 0;
        $result = "Учет аренды для " . $this->getName() . "\n";

        foreach ($this->_rentals as $each) {
            $thisAmount = $this->amountFor($each);
// добавить очки для активного арендатора
            $frequentRenterPoints ++;
// бонус за аренду новинки на два дня
            if (($each->getMovie()->getPriceCode() == Movie :: NEW_RELEASE) &&
                    $each->getDaysRented() > 1)
                $frequentRenterPoints ++;
//показать результаты для этой аренды
            $result .= "\t" . $each->getMovie()->getTitle() . "\t" . $thisAmount . "\n";
            $totalAmount += $thisAmount;
        }
//добавить нижний колонтитул
        $result .= "Сумма задолженности составляет " . $totalAmount . "\n";
        $result .= "Вы заработали " . $frequentRenterPoints . " очков за активность";
        return $result;
    }

}

?>
