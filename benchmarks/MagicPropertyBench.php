<?php

namespace Witchcraft;

use Witchcraft\Test\Unicorn;

/**
 * @BeforeMethods({"init"})
 */

class MagicPropertyBench
{
    private $data;

    public function init()
    {
        $this->unicorn = new Unicorn();
    }

    /**
     * @Revs(1000)
     * @Iterations(10)
     */
    public function benchMagicProperties()
    {
        $this->unicorn->color = "red";
        $birthday = $this->unicorn->color;
    }

    /**
     * @Revs(1000)
     * @Iterations(10)
     */
    public function benchPublicProperties()
    {
        $this->unicorn->speed = "10km/h";
        $speed = $this->unicorn->speed;
    }
}
