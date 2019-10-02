<?php
declare(strict_types=1);

namespace BSP\CommandBus\Tests\Stub;

use BSP\CommandBus\Contracts\AggregateId;
use BSP\CommandBus\Contracts\Command;

final class AddSugarToCoffee implements Command
{
    private $nbSugars;
    private $coffee;

    public function __construct(int $nbSugars, Coffee $coffee)
    {
        $this->nbSugars = $nbSugars;
        $this->coffee = $coffee;
    }

    public function nbSugars(): int
    {
        return $this->nbSugars;
    }

    public function coffee(): Coffee
    {
        return $this->coffee;
    }

    public function aggregateId(): AggregateId
    {
        return $this->coffee->coffeeId;
    }
}
