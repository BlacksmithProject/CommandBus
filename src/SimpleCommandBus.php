<?php
declare(strict_types=1);

namespace BSP\CommandBus;

use BSP\CommandBus\Contracts\Command;
use BSP\CommandBus\Contracts\CommandBus;
use BSP\CommandBus\Contracts\CommandHandlerMap;
use BSP\CommandBus\Exception\CommandHandlerIsNotCallable;
use BSP\CommandBus\Exception\CommandHandlerNotFound;

final class SimpleCommandBus implements CommandBus
{
    private $handlers;

    public function __construct(CommandHandlerMap $commandHandlerMap)
    {
        $this->handlers = $commandHandlerMap->map();
    }

    public function execute(Command $command): void
    {
        $commandClass = \get_class($command);

        if (!isset($this->handlers[$commandClass])) {
            throw CommandHandlerNotFound::forCommand($commandClass);
        }

        if (!is_callable($this->handlers[$commandClass])) {
            throw new CommandHandlerIsNotCallable();
        }

        ($this->handlers[$commandClass])($command);
    }
}
