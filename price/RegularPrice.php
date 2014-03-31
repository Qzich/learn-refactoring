<?php

namespace price;

/**
 * Description of RegularPrice
 *
 * @author Kuzich Yurii <qzichs@gmail.com>
 */
class RegularPrice extends \Price {

    public function getPriceCode() {
        return \Movie::REGULAR;
    }

}

?>
