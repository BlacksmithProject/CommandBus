# Changelog

<details>
<summary>Unreleased</summary>

### BREAKING CHANGES
- `\BSP\CommandBus\Contracts\CommandBus::execute` now takes a `\BSP\CommandBus\Contracts\Command` as parameter instead of `object`
- `\BSP\CommandBus\SimpleCommandBus::execute` now takes a `\BSP\CommandBus\Contracts\Command` as parameter instead of `object`

### New features
- added `\BSP\CommandBus\Contracts\AggregateId`
- added `\BSP\CommandBus\Contracts\Command`

### Bugfixes

</details>

## v0.4.0

### BREAKING CHANGES
- remove old classes

### New features
- added `\BSP\CommandBus\Contracts\CommandBus`
- added `\BSP\CommandBus\SimpleCommandBus`
- added `\BSP\CommandBus\Contracts\CommandHandlerMap`
- added `\BSP\CommandBus\SimpleCommandHandlerMap`

## v0.3.0

### BREAKING CHANGES

- remove `BSP\CommandBus\Command`

## v0.2.1

### New features

- update `blacksmith-project/dr-watson`

## v0.2.0

### BREAKING CHANGES

- Change `BSP\` namespace into `BSP\CommandBus\`

## v0.1.2

### New features

- Add `\BSP\CommandBusException`
- `BSP\CommandBus` throws an exception if used with unrelated command

## v0.1.1

### New features

- Improve `BSP\CommandBus`'s documentation.

## v0.1.0

### New features

- Add `\BSP\CommandBus`
- Add `\BSP\Command`
- Add `\BSP\CommandHandler`
