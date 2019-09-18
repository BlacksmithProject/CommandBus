<?php declare(strict_types=1);

namespace BSP\CommandBus\Exception;

use Throwable;

final class CommandHandlerNotFound extends \RuntimeException
{
    private function __construct(
        $message,
        $code = 0,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }

    public static function forCommand(string $commandClass, int $code = 0, Throwable $previous = null): self
    {
        $message = sprintf(
            "I cannot find a handler for the command `%s`. You should check those possibilities: %s
            - You forgot to inject a CommandHandlerMap to the CommandBus. %s
            - You forgot to add the couple command/handler to your CommandHandlerMap.",
            $commandClass,
            PHP_EOL,
            PHP_EOL
        );

        return new self($message, $code, $previous);
    }
}
