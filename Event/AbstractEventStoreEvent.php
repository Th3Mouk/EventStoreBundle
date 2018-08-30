<?php

/*
 * (c) Jérémy Marodon <marodon.jeremy@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Th3Mouk\EventStoreBundle\Event;

use Th3Mouk\EventStoreClient\Event;
use Th3Mouk\EventStoreClient\EventCollection;

abstract class AbstractEventStoreEvent extends \Symfony\Component\EventDispatcher\Event
{
    protected $stream;

    /** @var Event|EventCollection */
    protected $payload;

    /**
     * @param Event|EventCollection $payload
     */
    public function __construct(string $stream, $payload)
    {
        $this->stream = $stream;
        $this->payload = $payload;
    }

    public function getStream(): string
    {
        return $this->stream;
    }

    /** @return Event|EventCollection */
    public function getPayload()
    {
        return $this->payload;
    }
}
