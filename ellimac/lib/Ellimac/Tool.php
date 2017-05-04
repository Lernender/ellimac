<?php
namespace Ellimac;


class Tool {

    /**
     * @var array
     */
    protected static $notFoundClassNames = [];

    /**
     * @param $class
     * @return bool
     */
    public static function classExists($class)
    {
        return self::classInterfaceExists($class, "class");
    }

    /**
     * @param $class
     * @return bool
     */
    public static function interfaceExists($class)
    {
        return self::classInterfaceExists($class, "interface");
    }

    /**
     * @param $class
     * @param $type
     * @return bool
     */
    protected static function classInterfaceExists($class, $type)
    {
        $functionName = $type . "_exists";
        // if the class is already loaded we can skip right here
        if ($functionName($class, false)) {
            return true;
        }
        $class = "\\" . ltrim($class, "\\");
        // let's test if we have seens this class already before
        if (isset(self::$notFoundClassNames[$class])) {
            return false;
        }

//        set_error_handler(function ($errno, $errstr, $errfile, $errline) {
//            //Logger::debug(implode(" ", [$errno, $errstr, $errfile, $errline]));
//        });

        \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);
        $exists = $functionName($class);
        \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(false);
        restore_error_handler();
        if (!$exists) {
            self::$notFoundClassNames[$class] = true; // value doesn't matter, key lookups are faster ;-)
        }
        return $exists;
    }


}