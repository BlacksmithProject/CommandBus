<?php
declare(strict_types=1);

namespace BSP;

interface CommandHandler
{
    public function handle(Command $command): void;
}
