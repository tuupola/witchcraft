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

    private $color;
    private $options;

    public function __construct(array $options = [])
    {
        /* Default options. */
        $this->options = array(
            "color" => "rainbow",
            "owner" => "tuupola",
        );

        if ($options) {
            $this->options = array_merge($this->options, $options);
        }

        /* Test color as private property. */
        $this->color = $this->options["color"];
        unset($this->options["color"]);
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
