<?php

use Witchcraft\Test\Unicorn;

/**
 * @BeforeMethods({"init"})
 */

class DynamicMethodBench
{
    private $unicorn;

    public function init()
    {
        $this->unicorn = new Unicorn();
        $this->unicorn->dynamic = function() {
            return "bar";
        };
    }

    /**
     * @Revs(100)
     * @Iterations(5)
     */
    public function benchDynamicMethods()
    {
        $bar = $this->unicorn->dynamic();
    }

    /**
     * @Revs(100)
     * @Iterations(5)
     */
    public function benchPublicMethods()
    {
        $foo = $this->unicorn->static();
    }

}