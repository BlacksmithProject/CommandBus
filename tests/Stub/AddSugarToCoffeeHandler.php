<?php
declare(strict_types=1);

namespace BSP\CommandBus\Tests\Stub;

final class AddSugarToCoffeeHandler
{
    public function __invoke(AddSugarToCoffee $command): void
    {
        $coffee = $command->coffee();
        $coffee::$sugars += $command->nbSugars();
    }
}
