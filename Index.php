<?php

require_once 'bootstrap.php';
Index::main();

/**
 * Index class. Runs main method.
 *
 * @author Kuzich Yurii <qzichs@gmail.com>
 */
class Index {

    /**
     * 
     */
    public static function main() {
        $customer = new Customer("Orush Buk");
        echo $customer->statement();
    }

}
