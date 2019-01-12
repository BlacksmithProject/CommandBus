<?php
declare(strict_types=1);

namespace BSP\CommandBus\Tests\Mock;

use BSP\CommandBus\CommandBus;

final class CoffeeCommandBus extends CommandBus
{
    public function __construct(AddSugarToCoffeHandler $addSugarToCoffeHandler)
    {
        $this->handlers[AddSugarToCoffee::class] = $addSugarToCoffeHandler;
    }
}
