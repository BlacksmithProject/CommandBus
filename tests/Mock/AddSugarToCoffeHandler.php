<?php
declare(strict_types=1);

namespace BSP\Tests\Mock;

use BSP\Command;
use BSP\CommandHandler;

final class AddSugarToCoffeHandler implements CommandHandler
{
    /**
     * @param AddSugarToCoffee $command
     */
    public function handle(Command $command): void
    {
        $coffee = $command->coffee();
        $coffee::$sugars += $command->nbSugars();
    }
}
