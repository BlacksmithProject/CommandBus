<?php declare(strict_types=1);

namespace BSP\CommandBus\Tests;

use BSP\CommandBus\Exception\CommandHandlerClassNameDoesNotEndWithHandler;
use BSP\CommandBus\SimpleCommandHandlerMap;
use BSP\CommandBus\Tests\Stub\AddSugarToCoffee;
use BSP\CommandBus\Tests\Stub\AddSugarToCoffeeHandler;
use BSP\CommandBus\Tests\Stub\Coffee;
use PHPUnit\Framework\TestCase;

final class SimpleCommandHandlerMapTest extends TestCase
{
    public function test handlers can be added()
    {
        // Given
        $map = new SimpleCommandHandlerMap([]);
        $this->assertSame($map->map(), []);
        $handler = new AddSugarToCoffeeHandler();

        // When
        $map->add($handler);

        // Then
        $this->assertSame($map->map(), [
            'BSP\CommandBus\Tests\Stub\AddSugarToCoffee' => $handler,
        ]);
    }

    public function test notHandlers cannot be added()
    {
        // Given
        $handler = new AddSugarToCoffee(1, new Coffee());

        // Then
        $this->expectException(CommandHandlerClassNameDoesNotEndWithHandler::class);

        // When
        new SimpleCommandHandlerMap([$handler]);
    }
}
