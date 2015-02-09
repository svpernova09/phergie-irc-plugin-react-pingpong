# Bot responsiveness testing plugin for [Phergie](http://github.com/phergie/phergie-irc-bot-react/)

[Phergie](http://github.com/phergie/phergie-irc-bot-react/) plugin for testing the bot's responsiveness.

[![Build Status](https://scrutinizer-ci.com/g/chrismou/phergie-irc-plugin-react-pingpong/badges/build.png?b=master)](https://scrutinizer-ci.com/g/chrismou/phergie-irc-plugin-react-pingpong/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/chrismou/phergie-irc-plugin-react-pingpong/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/chrismou/phergie-irc-plugin-react-pingpong/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/chrismou/phergie-irc-plugin-react-pingpong/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/chrismou/phergie-irc-plugin-react-pingpong/?branch=master)

## About

This plugin is designed to simply return a response to the phrase "ping", and is most commonly used to test the bot is still
responsive.

## Install

The recommended method of installation is [through composer](http://getcomposer.org).

```JSON
{
    "require": {
        "chrismou/phergie-irc-plugin-react-pingpong": "dev-master"
    }
}
```

See Phergie documentation for more information on
[installing and enabling plugins](https://github.com/phergie/phergie-irc-bot-react/wiki/Usage#plugins).

## Configuration

To use the default settings, simply add the following to your config file:

```php
new \Chrismou\Phergie\Plugin\PingPong\Plugin
```

Or you can add a custom response phrase:

```php
new \Chrismou\Phergie\Plugin\PingPong\Plugin(array(
    "response" => "lolwut"
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
