<?php

/*
 * This file is part of the Witchcraft package
 *
 * Copyright (c) 2014 Mika Tuupola
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Project home:
 *   https://github.com/tuupola/witchcraft
 *
 */

namespace Witchcraft;

trait MagicMethods
{

    public function __call($method, $arguments)
    {

        if (count($arguments)) {
            $method = "set" . ucfirst($method);
            if (method_exists($this, $method)) {
                return call_user_func([$this, $method], $arguments[0]);
            }
        } else {
            $method = "get" . ucfirst($method);
            if (method_exists($this, $method)) {
                return call_user_func([$this, $method]);
            }
        }

        $message =  "Call to undefined method " . __CLASS__ . "::" . $method . "()";

        throw new \Exception($message);
    }
}
