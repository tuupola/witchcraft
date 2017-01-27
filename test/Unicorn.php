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

namespace Witchcraft\Test;

class Unicorn
{

    use \Witchcraft\MagicMethods;
    use \Witchcraft\MagicProperties;
    use \Witchcraft\Hydrate;

    public $speed;

    private $color = "rainbow";
    private $options = [
        "owner" => "tuupola",
        "birthday" => null,
        "dynamic" => null,
        "super.power" => null
    ];

    public function __construct(array $options = [])
    {
        $this->hydrate($options);
    }

    public function static()
    {
        return "foo";
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

    public function getDynamic()
    {
        return $this->options["dynamic"];
    }

    public function setDynamic($dynamic)
    {
        $this->options["dynamic"] = $dynamic;
        return $this;
    }

    public function getSuperPower()
    {
        return $this->options["super.power"];
    }

    public function setSuperPower($power)
    {
        $this->options["super.power"] = $power;
        return $this;
    }
}
