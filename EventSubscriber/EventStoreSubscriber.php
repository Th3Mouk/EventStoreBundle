<?php

/*
 * (c) Jérémy Marodon <marodon.jeremy@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Th3Mouk\EventStoreBundle\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Th3Mouk\EventStoreBundle\Event\ImmediatEventStoreEvent;
use Th3Mouk\EventStoreClient\Client;

class EventStoreSubscriber implements EventSubscriberInterface
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public static function getSubscribedEvents()
    {
        return [
            ImmediatEventStoreEvent::NAME => 'send',
        ];
    }

    public function send(ImmediatEventStoreEvent $event)
    {
        $this->client->send($event->getStream(), $event->getPayload());
    }
}
