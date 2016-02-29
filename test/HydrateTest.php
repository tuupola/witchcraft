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

class HydrateTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldHydrateWithSetter()
    {
        $unicorn = new Unicorn([
            "color" => "blue",
            "owner" => "malvina",
            "super.power" => "sneeze"
        ]);
        $this->assertEquals($unicorn->color(), "blue");
        $this->assertEquals($unicorn->owner(), "malvina");
        $this->assertEquals($unicorn->superPower(), "sneeze");

        $unicorn->hydrate(["color" => "black", "super.power" => "fly"]);
        $this->assertEquals($unicorn->color(), "black");
        $this->assertEquals($unicorn->superPower(), "fly");
    }

    public function testShouldHydrateWithProperty()
    {
        $unicorn = new Unicorn([
            "speed" => 256
        ]);
        $this->assertEquals($unicorn->speed, 256);

        $unicorn->hydrate(["speed" => 512]);
        $this->assertEquals($unicorn->speed, 512);
    }

    public function testShouldThrowException()
    {
        $this->setExpectedException("Exception");
        $unicorn = new Unicorn();
        $unicorn->hydrate(["nosuch" => 666]);
    }
}
