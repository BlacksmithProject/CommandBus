# BlacksmithProject - CommandBus

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
