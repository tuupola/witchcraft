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

    public function testShouldGetAndSetBirthday()
    {
        $unicorn = new Unicorn();
        $unicorn->birthday("1930-24-12");
        $test = \DateTime::createFromFormat("Y-m-d", "1930-24-12");
        $this->assertEquals($unicorn->birthday(), $test);
    }

    public function testShouldGetAge()
    {
        $unicorn = new Unicorn();
        $unicorn->birthday("1930-24-10");
        $this->assertEquals($unicorn->age(), "84 years");
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

    public function testShouldGetAndSetDynamicFunction()
    {
        $unicorn = new Unicorn();
        $unicorn->dynamic(function ($input) {
            return "Got {$input}!";
        });
        $this->assertEquals($unicorn->dynamic("milk"), "Got milk!");

        $unicorn->dynamic = function ($input) {
            return "No {$input}!";
        };
        $this->assertEquals($unicorn->dynamic("beer"), "No beer!");
    }

    public function testShouldGetAndSetDynamicFunctionWithManyParameters()
    {
        $unicorn = new Unicorn();
        $unicorn->dynamic(function ($foo, $bar) {
            return "Got {$foo} and {$bar}!";
        });
        $this->assertEquals($unicorn->dynamic("milk", "honey"), "Got milk and honey!");

        $unicorn->dynamic = function ($foo, $bar) {
            return "No {$foo} or {$bar}!";
        };
        $this->assertEquals($unicorn->dynamic("beer", "vodka"), "No beer or vodka!");
    }
}
