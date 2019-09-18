<?php
declare(strict_types=1);

namespace BSP\CommandBus\Tests\Stub;

final class AddSugarToCoffee
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
}
