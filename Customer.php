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
        $result = "Учет аренды для " . $this->getName() . "\n";

        foreach ($this->_rentals as $each) {
//показать результаты для этой аренды
            $result .= "\t" . $each->getMovie()->getTitle() . "\t" . $each->getCharge() . "\n";
        }
//добавить нижний колонтитул
        $result .= "Сумма задолженности составляет " . $this->getTotalCharge() . "\n";
        $result .= "Вы заработали " . $this->getFrequentRenterPoints() . " очков за активность";
        return $result;
    }

    public function htmlStatement() {
        $result = "<H1>Операции аренды для <EM>" . $this->getName() .
                "</EM></H1><P>\n";
        foreach ($this->_rentals as $each) {
// показать результаты по каждой аренде
            $result .= $each->getMovie()->getTitle() . ": " .
                    $each->getCharge() . "<BR>\n";
        }
//добавить нижний колонтитул
        $result .= "<P>Ваша задолженность составляет <EM>" .
                $this->getTotalCharge() . "</EM><P>\n";
        $result .= "На этой аренде вы заработали <EM>" .
                $this->getFrequentRenterPoints() .
                "</EM> очков за активность<P>";
        return $result;
    }

    /**
     * 
     * @return int
     */
    private function getTotalCharge() {
        $totalAmount = 0;
        foreach ($this->_rentals as $each) {
            $totalAmount += $each->getCharge();
        }
        return $totalAmount;
    }

    /**
     * return int
     */
    private function getFrequentRenterPoints() {
        $frequentRenterPoints = 0;
        foreach ($this->_rentals as $each) {
            $frequentRenterPoints += $each->getFrequentRenterPoints();
        }
        return $frequentRenterPoints;
    }

}

?>
