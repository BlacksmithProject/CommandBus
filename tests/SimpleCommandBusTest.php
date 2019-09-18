<?php
declare(strict_types=1);

namespace BSP\CommandBus\Tests;

use BSP\CommandBus\Exception\CommandHandlerIsNotCallable;
use BSP\CommandBus\Exception\CommandHandlerNotFound;
use BSP\CommandBus\SimpleCommandBus;
use BSP\CommandBus\SimpleCommandHandlerMap;
use BSP\CommandBus\Tests\Stub\AddSugarToCoffee;
use BSP\CommandBus\Tests\Stub\AddSugarToCoffeeHandler;
use BSP\CommandBus\Tests\Stub\BuyCoffee;
use BSP\CommandBus\Tests\Stub\BuyCoffeeHandler;
use BSP\CommandBus\Tests\Stub\Coffee;
use BSP\CommandBus\Tests\Stub\ServeCoffeeInCup;
use PHPUnit\Framework\TestCase;

final class SimpleCommandBusTest extends TestCase
{
    public function test it can execute command with proper handler(): void
    {
        // Given
        $commandHandlerMap = new SimpleCommandHandlerMap([new AddSugarToCoffeeHandler()]);
        $commandBus = new SimpleCommandBus($commandHandlerMap);

        $coffee = new Coffee();
        $this->assertSame(0, $coffee::$sugars);
        $command = new AddSugarToCoffee(2, $coffee);

        // When
        $commandBus->execute($command);

        // Then
        $this->assertSame(2, $coffee::$sugars);
    }

    public function test it cannot execute command without handler(): void
    {
        // Given
        $commandHandlerMap = new SimpleCommandHandlerMap([]);
        $commandBus = new SimpleCommandBus($commandHandlerMap);
        $command = new ServeCoffeeInCup();

        // Then
        $this->expectException(CommandHandlerNotFound::class);

        // When
        $commandBus->execute($command);
    }

    public function test it cannot execute command with an handler that is not callable(): void
    {
        // Given
        $commandHandlerMap = new SimpleCommandHandlerMap([new BuyCoffeeHandler()]);
        $commandBus = new SimpleCommandBus($commandHandlerMap);
        $command = new BuyCoffee();

        // Then
        $this->expectException(CommandHandlerIsNotCallable::class);

        // When
        $commandBus->execute($command);
    }
}
