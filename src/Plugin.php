<?php
/**
 * Phergie plugin for testing the bot's responsiveness (https://github.com/chrismou/phergie-irc-plugin-react-pingpong)
 *
 * @link https://github.com/chrismou/phergie-irc-plugin-react-pingpong for the canonical source repository
 * @copyright Copyright (c) 2015 Chris Chrisostomou (https://mou.me)
 * @license http://phergie.org/license New BSD License
 * @package Chrismou\Phergie\Plugin\PingPong
 */

namespace Chrismou\Phergie\Plugin\PingPong;

use Phergie\Irc\Bot\React\AbstractPlugin;
use Phergie\Irc\Bot\React\EventQueueInterface as Queue;
use Phergie\Irc\Plugin\React\Command\CommandEventInterface as Event;

/**
 * Plugin class.
 *
 * @category Chrismou
 * @package Chrismou\Phergie\Plugin\PingPong
 */
class Plugin extends AbstractPlugin
{
    /** @var string $responsePhrase */
    public $responsePhrase = 'pong';

    /**
     * Accepts plugin configuration.

     * @param array $config
     */
    public function __construct(array $config = array())
    {
        if (isset($config['response'])) {
            $this->responsePhrase = $config['response'];
        }
    }

    /**
     * Return subscribed events
     *
     * @return array
     */
    public function getSubscribedEvents()
    {
        return array(
            'command.ping' => 'handleCommand',
            'command.ping.help' => 'handleCommandHelp'
        );
    }

    /**
     * Handle the main "pong" command
     *
     * @param \Phergie\Irc\Plugin\React\Command\CommandEventInterface $event
     * @param \Phergie\Irc\Bot\React\EventQueueInterface $queue
     */
    public function handleCommand(Event $event, Queue $queue)
    {
        $queue->ircPrivmsg($event->getSource(), $this->responsePhrase);
    }

    /**
     * Handle the help command
     *
     * @param \Phergie\Irc\Plugin\React\Command\CommandEventInterface $event
     * @param \Phergie\Irc\Bot\React\EventQueueInterface $queue
     */
    public function handleCommandHelp(Event $event, Queue $queue)
    {
        foreach ($this->getHelpLines() as $helpLine) {
            $queue->ircPrivmsg($event->getSource(), $helpLine);
        }
    }

    /**
     * Return an array of help command response lines
     *
     * @return array
     */
    public function getHelpLines()
    {
        return array(
            'Usage: ping',
            'Returns the phrase "'.$this->responsePhrase.'" to test the bot is still responsive'
        );
    }
}
