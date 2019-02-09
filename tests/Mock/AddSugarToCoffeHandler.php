<?php
declare(strict_types=1);

namespace BSP\CommandBus\Tests\Mock;

use BSP\CommandBus\CommandHandler;

final class AddSugarToCoffeHandler implements CommandHandler
{
    /**
     * @param AddSugarToCoffee $command
     */
    public function handle($command): void
    {
        $coffee = $command->coffee();
        $coffee::$sugars += $command->nbSugars();
    }
}
