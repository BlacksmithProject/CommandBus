<?php
declare(strict_types=1);

namespace BSP\CommandBus\Tests\Stub;

final class Coffee
{
    /** @var CoffeeId */
    public $coffeeId;

    public static $sugars = 0;

    public function __construct()
    {
        $this->coffeeId = new CoffeeId();
    }
}
