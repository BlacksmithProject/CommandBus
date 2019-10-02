<?php declare(strict_types=1);

namespace BSP\CommandBus\Contracts;

interface AggregateId
{
    public function __toString();
}
