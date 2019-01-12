<?php
declare(strict_types=1);

namespace BSP\CommandBus;

use BSP\DrWatson\ExceptionType;

/**
 * CommandBus execute Command by handling it with the right CommandHandler.
 *
 * In order to do so, CommandBus::handlers needs to be filled with handler in its constructor:
 *
 * Exemple:
 * public function __constructor(DomainCommandHandler $domainCommandHandler) {
 *     $this->handlers[DomainCommand::class] = $domainCommandHandler;
 * }
 */
abstract class CommandBus
{
    /** @var CommandHandler[] */
    protected $handlers = [];

    /**
     * @throws CommandBusException
     */
    public function execute(Command $command): void
    {
        if (!isset($this->handlers[get_class($command)])) {
            throw new CommandBusException(
                ExceptionType::DOMAIN(),
                'domain.commandbus.command.unknown',
                sprintf('"%s" handlers.', static::class),
                sprintf('You may have forgotten to add the "%s" command to the "%s" CommandBus.', get_class($command), static::class)
            );
        }

        $this->handlers[get_class($command)]->handle($command);
    }
}
