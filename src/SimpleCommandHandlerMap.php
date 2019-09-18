<?php declare(strict_types=1);

namespace BSP\CommandBus;

use BSP\CommandBus\Contracts\CommandHandlerMap;
use BSP\CommandBus\Exception\CommandHandlerClassNameDoesNotEndWithHandler;

final class SimpleCommandHandlerMap implements CommandHandlerMap
{
    private $map = [];

    /**
     * @param iterable<string, callable> $handlers
     */
    public function __construct(iterable $handlers)
    {
        foreach ($handlers as $handler) {
            $this->add($handler);
        }
    }

    /**
     * @inheritDoc
     */
    public function map(): array
    {
        return $this->map;
    }

    public function add(object $handler): void
    {
        $handlerClass = \get_class($handler);

        if (false === $this->stringEndsWith($handlerClass, 'Handler')) {
            throw new CommandHandlerClassNameDoesNotEndWithHandler();
        }

        $commandClass = $this->getCommandClass($handlerClass);

        $this->map[$commandClass] = $handler;
    }

    private function stringEndsWith(string $string, string $endWith): bool
    {
        $text = substr($string, -strlen($endWith));

        return $text === $endWith;
    }

    private function getCommandClass(string $commandHandlerClass): string
    {
        $commandHandlerClassLength = strlen('Handler');

        return substr_replace($commandHandlerClass, '', -$commandHandlerClassLength, $commandHandlerClassLength);
    }
}
