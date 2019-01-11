<?php
declare(strict_types=1);

namespace BSP\Tests\Mock;

use BSP\Command;

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
}
