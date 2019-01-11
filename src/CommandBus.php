<?php
declare(strict_types=1);

namespace BSP;

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

    public function execute(Command $command): void
    {
        if (isset($this->handlers[get_class($command)])) {
            $this->handlers[get_class($command)]->handle($command);
        }
    }
}
