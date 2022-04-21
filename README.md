# BlacksmithProject - CommandBus

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/BlacksmithProject/CommandBus/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/BlacksmithProject/CommandBus/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/BlacksmithProject/CommandBus/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/BlacksmithProject/CommandBus/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/BlacksmithProject/CommandBus/badges/build.png?b=master)](https://scrutinizer-ci.com/g/BlacksmithProject/CommandBus/build-status/master)

## Why ?

In order to improve my skills, I'm doing my own implementation of a CommandBus.

## Installation

`composer require blacksmith-project/command-bus`

## How to set it up?

- Your handlers need to 
    + be callable (implements an `__invoke()` method).
    + be named after the command they handle:   
        ```php
        $command = new AddSugarToCoffee();
        $handler = new AddSugarToCoffeeHandler();
        ```
- Handlers must be added to a `CommandHandlerMap`:
    ```php
    $map = new SimpleCommandHandlerMap([$handler, $anotherHandler]);
    $map->add($yetAnotherHandler);
    ```
- Your `CommandBus` takes as parameter a `CommandHandlerMap`.

### How to do this in Symfony ?
1. Declare your Handlers as a Service.
2. Tag them with a specific tag such as `my_app.command_handler`.
3. Declare your `CommandHandlerMap` as a Service.
4. Make it use the tagged `my_app.command_handler` services as arguments.
5. Declare your `CommandBus` as a Service.
6. Make it use the `CommandHandlerMap` as argument.

#### Example:
```yaml
    # config/services.yaml

    ############
    # Commands #
    ############
    MyApp\Domain\ACommandHandler:
        tags:
            - 'my_app.command_handler'
    
    MyApp\Domain\AnothenCommandHandler:
        tags:
            - 'my_app.command_handler'

    ########################
    # CommandHandlerMapper #
    ########################
    BSP\CommandBus\SimpleCommandHandlerMap:
        arguments: [!tagged my_app.command_handler]

    ##############
    # CommandBus #
    ##############
    BSP\CommandBus\SimpleCommandBus:
        arguments:
            - BSP\CommandBus\SimpleCommandHandlerMap
```

## How to use it?

Now, you only need to inject your `CommandBus` and execute commands.

### Example:
```php
public function __construct(CommandBus $commandBus)
{
    $this->commandBus = $commandBus;
}

public function doSomethingFromCLI(): void
{
    $command = new DoSomething('please');

    $this->commandBus->execute($command);

    $output->writeln('command has been executed.');
}
```
