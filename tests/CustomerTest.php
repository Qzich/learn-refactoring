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
        $this->expectOutputString("Hello World"."\n");
        Index::main();
    }

}

?>
