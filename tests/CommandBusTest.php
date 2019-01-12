<?php
declare(strict_types=1);

namespace BSP\Tests;

use BSP\Tests\Mock\AddSugarToCoffee;
use BSP\Tests\Mock\AddSugarToCoffeHandler;
use BSP\Tests\Mock\Coffee;
use BSP\Tests\Mock\CoffeeCommandBus;
use PHPUnit\Framework\TestCase;

final class CommandBusTest extends TestCase
{
    private $commandBus;

    public function setUp()
    {
        $commandHandler = new AddSugarToCoffeHandler();
        $this->commandBus = new CoffeeCommandBus($commandHandler);
    }

    public function testCommandBus(): void
    {
        $coffee = new Coffee();

        $this->assertSame(0, $coffee::$sugars);

        $command = new AddSugarToCoffee(2, $coffee);

        $this->commandBus->execute($command);

        $this->assertSame(2, $coffee::$sugars);
    }
}
