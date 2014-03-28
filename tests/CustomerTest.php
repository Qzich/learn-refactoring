<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IndexTest
 *
 * @author Kuzich Yurii <qzichs@gmail.com>
 */
class CustomerTest extends PHPUnit_Framework_TestCase {

    //put your code here

    public static function statementProvider() {
        return array(
            array(
                "Учет аренды для Orish Bandera\n" .
                "\tRunaway Jury\t2\n" .
                "Сумма задолженности составляет 2\n" .
                "Вы заработали 1 очков за активность"
                ,
                new Rental(new Movie("Runaway Jury", Movie::REGULAR), 1),
                "Orish Bandera"
            ),
            array(
                "Учет аренды для ГУНИШ\n" .
                "\tJarhead\t12\n" .
                "Сумма задолженности составляет 12\n" .
                "Вы заработали 2 очков за активность"
                ,
                new Rental(new Movie("Jarhead", Movie::NEW_RELEASE), 4),
                "ГУНИШ"
            ),
            array(
                "Учет аренды для ДИАЛЬД\n" .
                "\tRed Eye\t6\n" .
                "Сумма задолженности составляет 6\n" .
                "Вы заработали 1 очков за активность"
                ,
                new Rental(new Movie("Red Eye", Movie::CHILDRENS), 6),
                "ДИАЛЬД"
            )
        );
    }

    /**
     * 
     */
    public function testStatementNoRentals() {
        $customer = new Customer("Orish");
        $expectedString = "Учет аренды для Orish\n";
        $expectedString .="Сумма задолженности составляет 0\n";
        $expectedString .="Вы заработали 0 очков за активность";
        $result = $customer->statement();
        $this->assertEquals($expectedString, $result);
    }

    /**
     * 
     * @param string $result
     * @param Rental $rental
     * @param string $clientName
     * @dataProvider statementProvider
     */
    public function testStatementWithRental($result, Rental $rental, $clientName) {
        $customer = new Customer($clientName);
        $customer->addRental($rental);
        $actResult = $customer->statement();
        $this->assertEquals($result, $actResult);
    }

    public function testStatementWithMoreRentals() {
        $customer = new Customer("Orish");
        $customer->addRental(new Rental(new Movie("Runaway Jury", Movie::REGULAR), 1));
        $customer->addRental(new Rental(new Movie("Red Eye", Movie::CHILDRENS), 6));
        $customer->addRental(new Rental(new Movie("Jarhead", Movie::NEW_RELEASE), 4));
        $expectedString = "Учет аренды для Orish\n";
        $expectedString .="\tRunaway Jury\t2\n";
        $expectedString .="\tRed Eye\t6\n";
        $expectedString .="\tJarhead\t12\n";
        $expectedString .="Сумма задолженности составляет 20\n";
        $expectedString .="Вы заработали 4 очков за активность";
        $result = $customer->statement();
        $this->assertEquals($expectedString, $result);
    }

}

?>
