<?php
declare(strict_types=1);

namespace BSP\CommandBus\Tests;

use BSP\CommandBus\CommandBusException;
use BSP\CommandBus\Tests\Mock\AddSugarToCoffee;
use BSP\CommandBus\Tests\Mock\AddSugarToCoffeHandler;
use BSP\CommandBus\Tests\Mock\Coffee;
use BSP\CommandBus\Tests\Mock\CoffeeCommandBus;
use BSP\CommandBus\Tests\Mock\ServeCoffeeInCup;
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

    /**
     * @throws CommandBusException
     */
    public function testCannotUseCommandBusWithoutHandler(): void
    {
        $this->expectException(CommandBusException::class);
        $this->expectExceptionMessage('This Commandbus cannot handle command "BSP\CommandBus\Tests\Mock\ServeCoffeeInCup".');

        $command = new ServeCoffeeInCup();

        $this->commandBus->execute($command);
    }
}
