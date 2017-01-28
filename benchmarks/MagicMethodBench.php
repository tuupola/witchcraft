<?php

namespace Witchcraft;

use Witchcraft\Test\Unicorn;

/**
 * @BeforeMethods({"init"})
 */

class MagicMethodBench
{
    private $unicorn;

    public function init()
    {
        $this->unicorn = new Unicorn();
    }

    /**
     * @Revs(1000)
     * @Iterations(10)
     */
    public function benchMagicMethods()
    {
        $this->unicorn->color("red");
        $this->birthday = $this->unicorn->color();
    }

    /**
     * @Revs(1000)
     * @Iterations(10)
     */
    public function benchPublicMethods()
    {
        $this->unicorn->setColor("red");
        $birthday = $this->unicorn->getColor();
    }
}
