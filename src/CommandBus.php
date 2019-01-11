<?php
declare(strict_types=1);

namespace BSP;

abstract class CommandBus
{
    /** @var CommandHandler[] */
    protected $handlers = [];

    public function execute(Command $command): void
    {
        if (isset($this->handlers[get_class($command)])) {
            $this->handlers[get_class($command)]->handle($command);
        }
    }
}
