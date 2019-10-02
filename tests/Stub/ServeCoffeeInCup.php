<?php
declare(strict_types=1);

namespace BSP\CommandBus\Tests\Stub;

use BSP\CommandBus\Contracts\AggregateId;
use BSP\CommandBus\Contracts\Command;

final class ServeCoffeeInCup implements Command
{
    public function aggregateId(): AggregateId
    {
        return new CoffeeId();
    }
}
