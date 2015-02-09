<?php
/**
 * Phergie plugin for testing the bot's responsiveness (https://github.com/chrismou/phergie-irc-plugin-react-pingpong)
 *
 * @link https://github.com/chrismou/phergie-irc-plugin-react-pingpong for the canonical source repository
 * @copyright Copyright (c) 2015 Chris Chrisostomou (https://mou.me)
 * @license http://phergie.org/license New BSD License
 * @package Chrismou\Phergie\Plugin\PingPong
 */

namespace Chrismou\Phergie\Tests\Plugin\PingPong;

use Phergie\Irc\Bot\React\EventQueueInterface as Queue;
use Phergie\Irc\Plugin\React\Command\CommandEvent as Event;
use Chrismou\Phergie\Plugin\PingPong\Plugin;
use \Mockery as m;

/**
 * Tests for the Plugin class.
 *
 * @category Chrismou
 * @package Chrismou\Phergie\Plugin\PingPong
 */
class PluginTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Mockery\MockInterface
     */
    private $eventMock;

    /**
     * @var \Mockery\MockInterface
     */
    private $queueMock;

    /**
     * @var \Chrismou\Phergie\Plugin\PingPong\Plugin
     */
    private $plugin;

    protected function setUp()
    {
        $this->plugin = new Plugin();
        $this->eventMock = $this->getMockEvent();
        $this->queueMock = $this->getMockQueue();
    }

    /**
     * Tests that getSubscribedEvents() returns an array.
     */
    public function testGetSubscribedEvents()
    {
        $plugin = new Plugin;
        $this->assertInternalType('array', $plugin->getSubscribedEvents());
    }

    public function testHandleCommand()
    {
        $source = '#channel';

        $this->eventMock->shouldReceive('getSource')
            ->andReturn($source)
            ->once();

        $this->eventMock->shouldReceive('getCustomCommand')
            ->andReturn("ping");

        $this->plugin->handleCommand($this->eventMock, $this->queueMock);

        $this->queueMock->shouldReceive('ircPrivmsg')
            ->withArgs(array($source, $this->plugin->responsePhrase));
    }

    /**
     * Tests handleCommandHelp() is doing what it's supposed to
     */
    public function testHandleCommandHelp()
    {
        $source = '#channel';

        $expectedLines = $this->plugin->getHelpLines();
        $this->assertInternalType('array', $expectedLines);

        $this->eventMock->shouldReceive('getSource')
            ->andReturn($source)
            ->times(count($expectedLines));

        $this->plugin->handleCommandHelp($this->eventMock, $this->queueMock);

        foreach ($expectedLines as $expectedLine) {
            $this->queueMock->shouldReceive('ircPrivmsg')
                ->withArgs(array($source, $expectedLine));
        }
    }

    /**
     * Returns a mock command event.
     *
     * @return \Phergie\Irc\Plugin\React\Command\CommandEventInterface
     */
    protected function getMockEvent()
    {
        return m::mock('\Phergie\Irc\Plugin\React\Command\CommandEventInterface');
    }

    /**
     * Returns a mock event queue.
     *
     * @return \Phergie\Irc\Bot\React\EventQueueInterface
     */
    protected function getMockQueue()
    {
        return m::mock('\Phergie\Irc\Bot\React\EventQueue', array('ircPrivmsg' => null));
    }
}
