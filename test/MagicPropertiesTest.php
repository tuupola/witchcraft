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

use PHPUnit\Framework\TestCase;

class MagicPropertiesTest extends TestCase
{

    public function testShouldGetAndSetOwner()
    {
        $unicorn = new Unicorn();
        $this->assertEquals($unicorn->owner, "tuupola");
        $unicorn->owner = "viemero";
        $this->assertEquals($unicorn->owner, "viemero");
    }

    public function testShouldGetAndSetColor()
    {
        $unicorn = new Unicorn();
        $this->assertEquals($unicorn->color, "rainbow");
        $unicorn->color = "black";
        $this->assertEquals($unicorn->color, "black");
    }

    public function testShouldGetAndSetBirthday()
    {
        $unicorn = new Unicorn();
        $unicorn->birthday = "1930-24-12";
        $test = \DateTime::createFromFormat("Y-m-d", "1930-24-12");
        $this->assertEquals($unicorn->birthday, $test);
    }

    public function testShouldGetAge()
    {
        $unicorn = new Unicorn();
        $unicorn->birthday = "1930-24-12";
        $this->assertEquals($unicorn->age, "86 years");
    }

    /**
     * @expectedException Exception
     */
    public function testGetShouldThrowException()
    {
        $unicorn = new Unicorn();
        $unicorn->nosuch;
    }

    /**
     * @expectedException Exception
     */
    public function testSetShouldThrowException()
    {
        $unicorn = new Unicorn();
        $unicorn->nosuch = 666;
    }
}
