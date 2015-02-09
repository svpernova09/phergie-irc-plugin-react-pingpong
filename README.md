# chrismou/phergie-irc-plugin-react-pingpong

[Phergie](http://github.com/phergie/phergie-irc-bot-react/) plugin for testing the bot's responsiveness.

[![Build Status](https://secure.travis-ci.org/chrismou/phergie-irc-plugin-react-pingpong.png?branch=master)](http://travis-ci.org/chrismou/phergie-irc-plugin-react-pingpong)

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

```php
new \Chrismou\Phergie\Plugin\PingPong\Plugin
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
