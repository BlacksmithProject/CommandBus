<?php declare(strict_types=1);

namespace BSP\CommandBus\Tests\Stub;

use BSP\CommandBus\Contracts\AggregateId;

final class CoffeeId implements AggregateId
{
    public function __toString()
    {
        return '';
    }
}
