<?php

namespace helpers;

/**
 * Simple autoloader class.
 *
 * @author Kuzich Yurii <qzichs@gmail.com>
 */
class Autoloader {

    public static function load($className) {
        $classFile = str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
        if (file_exists($classFile)) {
            ob_start();
            include_once $classFile;
            ob_clean();
        }
    }

}

?>
