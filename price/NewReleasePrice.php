<?php

namespace price;

/**
 * Description of NewReleasePrice
 *
 * @author Kuzich Yurii <qzichs@gmail.com>
 */
class NewReleasePrice extends \Price {

    public function getPriceCode() {
        return \Movie::NEW_RELEASE;
    }

}

?>
