<?php

require_once 'helpers/Autoloader.php';

/**
 * 
 */
class bootstrap {


    public static function inst() {
        return new self;
    }

    public function registerAutolodFunction() {
        spl_autoload_register(array('helpers\Autoloader', 'load'));
    }

    /**
     * Configure and run main function.
     */
    public function run() {
        $this->registerAutolodFunction();
    }

}

bootstrap::inst()->run();
?>