<?php declare(strict_types=1);

namespace BSP\CommandBus\Contracts;

/**
 * A Command will be applied on an Aggregate and must provide its id.
 */
interface Command
{
    public function aggregateId(): AggregateId;
}
