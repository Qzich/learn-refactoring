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
class IndexTest extends PHPUnit_Framework_TestCase {
    //put your code here

    /**
     * 
     */
    public function testMain() {
        $this->expectOutputString(
                "Учет аренды для Orush Buk\n" .
                "Сумма задолженности составляет 0\n" .
                "Вы заработали 0 очков за активность");
        Index::main();
    }

}

?>
