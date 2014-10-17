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

use \Witchcraft\MagicMethods;

class MagicMethodsTest extends \PHPUnit_Framework_TestCase
{

    public function testShouldGetAndSetOwner()
    {
        $unicorn = new Unicorn();
        $this->assertEquals($unicorn->owner(), "tuupola");
        $unicorn->owner("viemero");
        $this->assertEquals($unicorn->owner(), "viemero");
    }

    public function testShouldGetAndSetColor()
    {
        $unicorn = new Unicorn();
        $this->assertEquals($unicorn->color(), "rainbow");
        $unicorn->color("black");
        $this->assertEquals($unicorn->color(), "black");
    }

    public function testGetShouldThrowException()
    {
        $this->setExpectedException("Exception");

        $unicorn = new Unicorn();
        $unicorn->nosuch();
    }

    public function testSetShouldThrowException()
    {
        $this->setExpectedException("Exception");

        $unicorn = new Unicorn();
        $unicorn->nosuch(666);
    }
}
