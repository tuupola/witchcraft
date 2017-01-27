<?php

/*
 * This file is part of the Witchcraft package
 *
 * Copyright (c) 2014-2016 Mika Tuupola
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Project home:
 *   https://github.com/tuupola/witchcraft
 *
 */

namespace Witchcraft;

trait MagicProperties
{

    public static $methods = null;

    public function __get($property)
    {
        if (null === self::$methods) {
            self::$methods = array_flip(get_class_methods(__CLASS__));
        }
        $camel_case = str_replace(" ", "", ucwords(str_replace("_", " ", $property)));
        $method = "get{$camel_case}";

        if (isset(self::$methods[$method])) {
            /* Return from custom getter. */
            return call_user_func([$this, $method]);
        }

        $message =  "Trying to get undefined property " . __CLASS__ . "::$" . $property . ".";
        throw new \RuntimeException($message);

    }

    public function __set($property, $value)
    {
        if (null === self::$methods) {
            self::$methods = array_flip(get_class_methods(__CLASS__));
        }

        $camel_case = str_replace(" ", "", ucwords(str_replace("_", " ", $property)));
        $method = "set{$camel_case}";

        if (isset(self::$methods[$method])) {
            return call_user_func([$this, $method], $value);
        }

        $message =  "Trying to set undefined property " . __CLASS__ . "::$" . $property . ".";
        throw new \RuntimeException($message);
    }
}
