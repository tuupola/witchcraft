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

namespace Witchcraft\Test;

class Unicorn
{

    use \Witchcraft\MagicMethods;
    use \Witchcraft\MagicProperties;
    use \Witchcraft\Hydrate;

    private $color;
    private $options = [];

    public $speed;

    public function __construct(array $options = [])
    {
        /* Default options. */
        $defaults = array(
            "color" => "rainbow",
            "owner" => "tuupola",
        );

        /* Merge defaults with passed in options. */
        $merged = array_merge($defaults, $options);
        $this->hydrate($merged);
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
        return $this;
    }

    public function getOwner()
    {
        return $this->options["owner"];
    }

    public function setOwner($owner)
    {
        $this->options["owner"] = $owner;
        return $this;
    }

    public function getBirthday()
    {
        return $this->options["birthday"];
    }

    public function setBirthday($birthday)
    {
        $this->options["birthday"] = \DateTime::createFromFormat("Y-m-d", $birthday);
        return $this;
    }

    public function getAge()
    {
        $now = new \DateTime();
        return $this->birthday->diff($now)->format("%y years");
    }
}
