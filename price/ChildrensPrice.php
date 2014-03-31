<?php

namespace price;

/**
 * Description of ChildrenPrice
 *
 * @author Kuzich Yurii <qzichs@gmail.com>
 */
class ChildrensPrice extends \Price {

    public function getPriceCode() {
        return \Movie::CHILDRENS;
    }

}

?>
