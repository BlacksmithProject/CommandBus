<?php declare(strict_types=1);

namespace BSP\CommandBus\Contracts;

/**
 * CommandHandlerMap is a map of Command and Handlers.
 */
interface CommandHandlerMap
{
    /**
     * Map Command classes with corresponding handlers.
     *
     * Example:
     *     ['RegisterUser' => $registerUserHandler]
     *
     * @return iterable<string, callable>
     */
    public function map(): array;
}
