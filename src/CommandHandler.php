<?php
declare(strict_types=1);

namespace BSP\CommandBus;

interface CommandHandler
{
    public function handle($command): void;
}
