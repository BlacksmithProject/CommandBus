# BlacksmithProject - CommandBus

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/BlacksmithProject/CommandBus/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/BlacksmithProject/CommandBus/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/BlacksmithProject/CommandBus/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/BlacksmithProject/CommandBus/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/BlacksmithProject/CommandBus/badges/build.png?b=master)](https://scrutinizer-ci.com/g/BlacksmithProject/CommandBus/build-status/master)

## Why ?

In order to improve my skills, I'm doing my own implementation of a
CommandBus.

## Installation

`composer require blacksmith-project/command-bus`

## How to use it ?

- Your commands need to implement the empty interface `\BSP\Command`
- Your handlers need to implement the interface `\BSP\CommandHandler`
- Extends `\BSP\CommandBus` and add in your constructor the handlers.

You can look for example in the
[tests/Mock](https://github.com/BlacksmithProject/CommandBus/tree/master/tests/Mock)
folder.

Now, you only need to inject your CommandBus and execute Commands.

### Example:
```php
public function __construct(CommandBus $commandBus)
{
    $this->commandBus = $commandBus;
}

public function doSomethingFromCLI(): Response
{
    $command = new DoSomething('please');

    $this->commandBus->execute($command);

    return new Response('command has been executed.');
}
```