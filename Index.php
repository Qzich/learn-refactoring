<?php

/**
 * Index class. Runs main method.
 *
 * @author Kuzich Yurii <qzichs@gmail.com>
 */
class Index {

    /**
     * 
     */
    public static function main($args) {
        $customer = new Customer("Orush Buk");
        echo $customer->statement();
    }

}
