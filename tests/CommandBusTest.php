<?php
declare(strict_types=1);

namespace BSP\CommandBus\Tests;

use BSP\CommandBus\CommandBusException;
use BSP\CommandBus\Tests\Mock\AddSugarToCoffee;
use BSP\CommandBus\Tests\Mock\AddSugarToCoffeHandler;
use BSP\CommandBus\Tests\Mock\Coffee;
use BSP\CommandBus\Tests\Mock\CoffeeCommandBus;
use BSP\CommandBus\Tests\Mock\ServeCoffeeInCup;
use BSP\DrWatson\ExceptionType;
use PHPUnit\Framework\TestCase;

final class CommandBusTest extends TestCase
{
    /**
     * @var CoffeeCommandBus
     */
    private $commandBus;

    public function setUp()
    {
        $commandHandler = new AddSugarToCoffeHandler();
        $this->commandBus = new CoffeeCommandBus($commandHandler);
    }

    /**
     * @throws CommandBusException
     */
    public function testCommandBus(): void
    {
        $coffee = new Coffee();

        $this->assertSame(0, $coffee::$sugars);

        $command = new AddSugarToCoffee(2, $coffee);

        $this->commandBus->execute($command);

        $this->assertSame(2, $coffee::$sugars);
    }

    public function testCannotUseCommandBusWithoutHandler(): void
    {
        $command = new ServeCoffeeInCup();

        try {
            $this->commandBus->execute($command);
        } catch (CommandBusException $exception) {
            $this->assertTrue(ExceptionType::DOMAIN()->equals($exception->type()));
            $this->assertSame('domain.commandbus.command.unknown', $exception->message());
            $this->assertSame('"BSP\CommandBus\Tests\Mock\CoffeeCommandBus" handlers.', $exception->suspect());
            $this->assertSame(
                'You may have forgotten to add the "BSP\CommandBus\Tests\Mock\ServeCoffeeInCup" command to the "BSP\CommandBus\Tests\Mock\CoffeeCommandBus" CommandBus.',
                $exception->help()
            );
        }
    }
}
