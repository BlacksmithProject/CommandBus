<?php declare(strict_types=1);

namespace BSP\CommandBus\Contracts;

use BSP\CommandBus\Exception\CommandHandlerIsNotCallable;
use BSP\CommandBus\Exception\CommandHandlerNotFound;

/**
 * CommandBus execute a command by handling it with the right handler.
 */
interface CommandBus
{
    /**
     * Find the proper handler and use it to execute the provided command.
     *
     * @throws CommandHandlerNotFound
     * @throws CommandHandlerIsNotCallable
     */
    public function execute(object $command): void;
}
