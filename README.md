# Bot responsiveness testing plugin for [Phergie](http://github.com/phergie/phergie-irc-bot-react/)

[Phergie](http://github.com/phergie/phergie-irc-bot-react/) plugin for testing the bot's responsiveness.

[![Build Status](https://travis-ci.org/chrismou/phergie-irc-plugin-react-pingpong.svg)](https://travis-ci.org/chrismou/phergie-irc-plugin-react-pingpong)
[![Test Coverage](https://codeclimate.com/github/chrismou/phergie-irc-plugin-react-pingpong/badges/coverage.svg)](https://codeclimate.com/github/chrismou/phergie-irc-plugin-react-pingpong/coverage)
[![Code Climate](https://codeclimate.com/github/chrismou/phergie-irc-plugin-react-pingpong/badges/gpa.svg)](https://codeclimate.com/github/chrismou/phergie-irc-plugin-react-pingpong)

## About

This plugin is designed to simply return a response to the phrase "ping", most commonly used to test the bot's responsiveness.

## Install

The recommended method of installation is [through composer](http://getcomposer.org).

```JSON
composer require chrismou/phergie-irc-plugin-react-pingpong
```

See Phergie documentation for more information on
[installing and enabling plugins](https://github.com/phergie/phergie-irc-bot-react/wiki/Usage#plugins).

## Configuration

To use the default settings, simply add the following to your config file:

```php
new \Chrismou\Phergie\Plugin\PingPong\Plugin
```

Or you can set one of both of the custom config values. "response" is the phrase the bot will reply back with (defaults to "pong"), 
and "reply" sets whether the bot should reply back to the user directly (defaults to false):

```php
new \Chrismou\Phergie\Plugin\PingPong\Plugin(array(
    "response" => "lolwut",
    "reply" => false
))
```

## Tests

To run the unit test suite:

```
curl -s https://getcomposer.org/installer | php
php composer.phar install
./vendor/bin/phpunit
```

## License

Released under the BSD License. See `LICENSE`.
